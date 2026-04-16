<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $categories = [
            'Politics',
            'Business',
            'Health & Fitness',
            'Travel',
            'Food & Recipes',
            'Lifestyle',
            'Education',
            'Entertainment',
            'Sports',
            'Finance',
        ];
        foreach ($categories as $category) {
            Category::factory()->create(['name' => $category, 'slug' => Str::slug($category)]);
        }
    }
}
