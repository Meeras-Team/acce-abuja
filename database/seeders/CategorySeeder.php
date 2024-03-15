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
        $categories = array(['name' => 'technology', 'color' => '#5609aa'], ['name' => 'news', 'color' => '#5ff9aa']);
        foreach ($categories as $data) {
            Category::create($data);
        }
    }
}
