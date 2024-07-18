<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nom' => 'Technology'],
            ['nom' => 'Health'],
            ['nom' => 'Science'],
            ['nom' => 'Education'],
            ['nom' => 'Sports'],
            ['nom' => 'Entertainment'],
            ['nom' => 'Business'],
            ['nom' => 'Travel'],
            ['nom' => 'Lifestyle'],
            ['nom' => 'Food'],
        ];        

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
