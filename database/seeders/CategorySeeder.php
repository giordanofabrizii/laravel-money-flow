<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => "Car",
                'icon' => "fa-solid fa-car"
            ],
            [
                'name' => "House",
                'icon' => "fa-solid fa-house"
            ],
            [
                'name' => "Food",
                'icon' => "fa-solid fa-burger"
            ],
            [
                'name' => "Hobby",
                'icon' => "fa-solid fa-basketball"
            ],
            [
                'name' => "Gift",
                'icon' => "fa-solid fa-gift"
            ],
            [
                'name' => "Healt",
                'icon' => "fa-solid fa-user-doctor"
            ],
            [
                'name' => "Salary",
                'icon' => "fa-solid fa-money-bill"
            ],
        ];

        foreach ($categories as $categoryData) {
            $newcategory = new Category($categoryData);
            $newcategory->save();
        }
    }
}
