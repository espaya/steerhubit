<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;">
    <div style="max-width: 800px; margin: 20px auto; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="padding: 30px;">
            <!-- Header -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 40px;">
                <!-- Left-aligned Logo -->
                <div style="text-align: left;">
                    <a href="#" style="display: inline-block;">
                        <img src="{{ env('APP_URL') }}/assets/img/logo/logo.png" 
                            alt="Company Logo" 
                            style="display: block; max-width: 150px; width: 25%; height: auto; border: 0;">
                    </a>
                </div>
                
                <!-- Right-aligned Address -->
                <div style="text-align: right;">
                    <address style="display: inline-block; text-align: right; font-style: normal; margin: 0; color: #666; line-height: 1.6;">
                        SteerHubIT<br>
                        info@steerhubit.com<br>
                        +1 (848) 330-9298
                    </address>
                </div>
            </div>

            <!-- Invoice Info -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 40px; padding: 20px 30px; background: #f9f9f9; border-radius: 6px;">
                <!-- Left-aligned Invoice Info -->
                <div style="text-align: left;">
                    <h1 style="font-size: 28px; margin: 0 0 10px 0; color: #333; text-align: left;">Invoice</h1>
                    <p style="margin: 5px 0; color: #666; text-align: left;">No: <span style="font-weight: bold;">{{ $invoice->invoice_number }}</span></p>
                    <p style="margin: 5px 0; color: #666; text-align: left;">Date: <span style="font-weight: bold;">{{ $invoice->created_at->format('M d, Y') }}</span></p>
                </div>
                
                <!-- Right-aligned Invoice To -->
                <div style="text-align: right;">
                    <p style="margin: 0 0 5px 0; color: #666; text-align: right;">Invoice To:</p>
                    <p style="margin: 5px 0; font-weight: bold; text-align: right;">{{ $invoice->recipient_name }}</p>
                    <p style="margin: 5px 0; color: #666; text-align: right;"><i>{{ $invoice->recipient_email }}</i></p>
                    <p style="margin: 5px 0; color: #666; text-align: right;">{{ $invoice->recipient_phone }}</p>
                </div>
            </div>

            <!-- Products Table -->
            <div style="margin-bottom: 40px;">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #f5f5f5;">
                            <th style="padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd;">#</th>
                            <th style="padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd;">Product</th>
                            <th style="padding: 12px 15px; text-align: right; border-bottom: 1px solid #ddd;">Price Per Unit</th>
                            <th style="padding: 12px 15px; text-align: right; border-bottom: 1px solid #ddd;">Quantity</th>
                            <th style="padding: 12px 15px; text-align: right; border-bottom: 1px solid #ddd;">Order Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice->items as $index => $item)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 12px 15px;">{{ $index + 1 }}</td>
                            <td style="padding: 12px 15px;">
                                <div style="font-weight: bold; margin-bottom: 5px;">{{ $item->product_name }}</div>
                                <div style="display: flex; gap: 15px; font-size: 13px; color: #666;">
                                    @if($item->size)
                                        <div>Size: <span>{{ $item->size }}</span></div>
                                    @endif
                                    @if($item->color)
                                        <div>Color: <span>{{ $item->color }}</span></div>
                                    @endif
                                </div>
                            </td>
                            <td style="padding: 12px 15px; text-align: right;">${{ number_format($item->price, 2) }}</td>
                            <td style="padding: 12px 15px; text-align: right;">{{ $item->quantity }}</td>
                            <td style="padding: 12px 15px; text-align: right;">${{ number_format($item->order_total, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Totals -->
                <div style="margin-top: 30px; text-align: right;">
                    <div style="display: inline-block; width: 300px; text-align: left;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Subtotal:</span>
                            <span>${{ number_format($invoice->subtotal, 2) }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Discount:</span>
                            <span>{{ $invoice->discount ? '$'.number_format($invoice->discount, 2) : '0%' }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-top: 20px; padding-top: 10px; border-top: 1px solid #eee; font-weight: bold; font-size: 18px;">
                            <span>Total:</span>
                            <span style="color: #4a6bff;">${{ number_format($invoice->total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div style="text-align: center; margin-top: 50px; padding-top: 20px; border-top: 1px solid #eee; color: #999; font-size: 13px;">
                <p>Thank you for your business!</p>
                <p>If you have any questions about this invoice, please contact our support team.</p>
            </div>
        </div>
    </div>
</body>
</html>