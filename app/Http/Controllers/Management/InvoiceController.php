<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 20); // default
        $search = $request->get('search');

        $query = Invoice::with('items')->latest();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('invoice_number', 'like', "%{$search}%")
                ->orWhere('recipient_name', 'like', "%{$search}%")
                ->orWhere('recipient_email', 'like', "%{$search}%")
                ->orWhereHas('items', function($q) use ($search) {
                    $q->where('product_name', 'like', "%{$search}%");
                });
            });
        }

        // Clone query to get total count without pagination
        $totalItems = (clone $query)->count();

        // Dynamically build per-page options
        $perPageOptions = [];
        $step = 20;
        for ($i = $step; $i < $totalItems; $i += $step) {
            $perPageOptions[] = $i;
        }
        $perPageOptions[] = $totalItems; // Add total as final option

        $invoices = $query->paginate($perPage)->appends([
            'search' => $search,
            'per_page' => $perPage,
        ]);

        return view('admin.invoice.admin-invoice', [
            'invoices' => $invoices,
            'perPage' => $perPage,
            'perPageOptions' => $perPageOptions,
        ]);
    }


    public function create()
    {
        return view('admin.invoice.admin-add-invoice');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipient.name' => ['required', 'string', 'max:255'],
            'recipient.phone' => ['required', 'string', 'regex:/^(\+?\d{1,3}[-.\s]?)?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'recipient.email' => ['required', 'email', 'max:255'],
            'products.*.product' => ['required', 'string', 'max:255'],
            'products.*.price' => ['required', 'numeric', 'min:0'],
            'products.*.quantity' => ['required', 'integer', 'min:1'],
            'products.*.order_total' => ['required', 'numeric', 'min:0'],
            'discount' => ['nullable', 'numeric', 'min:0'],
            'subtotal' => ['required', 'numeric', 'min:0'],
            'total' => ['required', 'numeric', 'min:0']
        ], [
            'recipient.name.required' => 'The recipient name field is required',
            'recipient.name.string' => 'The recipient name must be a string',
            'recipient.name.max' => 'The recipient name may not be greater than 255 characters',
            
            'recipient.phone.required' => 'The phone number field is required',
            'recipient.phone.string' => 'The phone number must be a string',
            'recipient.phone.regex' => 'Please enter a valid phone number (e.g., +1234567890 or 123-456-7890)',
            
            'recipient.email.required' => 'The email field is required',
            'recipient.email.email' => 'Please enter a valid email address',
            'recipient.email.max' => 'The email may not be greater than 255 characters',
            
            'products.*.product.required' => 'Each product must have a name',
            'products.*.product.string' => 'Product name must be text',
            'products.*.product.max' => 'Product name may not be longer than 255 characters',
            
            'products.*.price.required' => 'Each product must have a price',
            'products.*.price.numeric' => 'Price must be a number',
            'products.*.price.min' => 'Price cannot be negative',
            
            'products.*.quantity.required' => 'Each product must have a quantity',
            'products.*.quantity.integer' => 'Quantity must be a whole number',
            'products.*.quantity.min' => 'Quantity must be at least 1',
            
            'products.*.order_total.required' => 'Each product must have a total amount',
            'products.*.order_total.numeric' => 'Total must be a number',
            'products.*.order_total.min' => 'Total cannot be negative',
            
            'discount.numeric' => 'Discount must be a number',
            'discount.min' => 'Discount cannot be negative',
            
            'subtotal.required' => 'Subtotal is required',
            'subtotal.numeric' => 'Subtotal must be a number',
            'subtotal.min' => 'Subtotal cannot be negative',
            
            'total.required' => 'Total amount is required',
            'total.numeric' => 'Total must be a number',
            'total.min' => 'Total cannot be negative'
        ]);

        try {
            DB::beginTransaction();

            // Generate invoice number (format: INV-YYYYMMDD-XXXX)
            $invoiceNumber = 'INV-' . date('Ymd') . '-' . str_pad(
                Invoice::whereDate('created_at', today())->count() + 1, 
                4, 
                '0', 
                STR_PAD_LEFT
            );

            $invoice = Invoice::create([
                'invoice_number' => $invoiceNumber, // Add this field
                'recipient_name' => $validated['recipient']['name'],
                'recipient_phone' => $validated['recipient']['phone'],
                'recipient_email' => $validated['recipient']['email'],
                'discount' => $validated['discount'] ?? 0,
                'subtotal' => $validated['subtotal'],
                'total' => $validated['total']
            ]);

            foreach ($validated['products'] as $product) {
                $invoice->items()->create([
                    'product_name' => $product['product'],
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                    'order_total' => $product['order_total']
                ]);
            }

            // Send the invoice to the recipient
            Mail::to($invoice->recipient_email)->send(new InvoiceMail($invoice));

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Invoice created successfully',
                'invoice_id' => $invoice->id,
                'invoice_number' => $invoiceNumber, // Return the number to frontend
                'redirect_url' => route('management.invoice.show', ['invoice_number' => $invoice->invoice_number]),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Invoice creation failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to create invoice. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function show($invoice_number)
    {
        $invoice = Invoice::with('items')->where('invoice_number', $invoice_number)->first();

        return view('admin.invoice.admin-view-invoice', [
            'invoice' => $invoice
        ]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        try 
        {
            DB::beginTransaction();

            $invoice = Invoice::with('items')->findOrFail($id);

            // Delete associated items first
            $invoice->items()->delete();

            // Then delete the invoice
            $invoice->delete();

            DB::commit();

            return redirect()->back()->with(['success' => 'Invoice deleted successfully']);

        }
        catch(ModelNotFoundException $ex)
        {
            DB::rollBack();

            return redirect()->back()->with(['error' => 'Invoice not found']);
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            Log::error('Error occurred whilst deleting this invoice: ' . $ex->getMessage());
            return redirect()->back()->with(['error' => 'Error occurred whilst deleting this invoice']);
        }
    }
}
