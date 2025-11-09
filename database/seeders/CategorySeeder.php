<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // For NIM Odd (Ganjil)
            [
                'name' => 'Data Science',
                'slug' => 'data-science',
                'description' => 'Explore articles about Machine Learning, Deep Learning, and Data Analysis',
            ],
            [
                'name' => 'Network Security',
                'slug' => 'network-security',
                'description' => 'Learn about Software Security, Network Administration, and Network Technology',
            ],
            // For NIM Even (Genap)
            [
                'name' => 'Interactive Multimedia',
                'slug' => 'interactive-multimedia',
                'description' => 'Discover Human Computer Interaction, User Experience, and Digital Immersive Technology',
            ],
            [
                'name' => 'Software Engineering',
                'slug' => 'software-engineering',
                'description' => 'Study Pattern Software Design, Agile Development, and Code Reengineering',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
