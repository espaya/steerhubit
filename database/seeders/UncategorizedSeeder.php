<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UncategorizedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_category')->insert([
            'category_name' => 'Uncategorized',
            'category_slug' => 'uncategorized',
            'category_description' => 'Default category for posts that haven\'t been assigned a specific category.',
            'category_count' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
