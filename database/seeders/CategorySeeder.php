<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $categories = ['Initial Expense', 'Income', 'Daily Expense', 'Other Expense'];
        foreach ($categories as $category) {
            if (!\App\Models\Category::where('name', $category)->exists()) {
                $data[] = [
                    'name' => $category,
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        \App\Models\Category::insert($data);
    }
}
