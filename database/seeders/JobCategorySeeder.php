<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['title' => 'Software Development'],
            ['title' => 'Project Management'],
            ['title' => 'Sales'],
            ['title' => 'Human Resources'],
            ['title' => 'Finance'],
            ['title' => 'Retail'],
            ['title' => 'Telecommunications'],
            ['title' => 'Construction'],
            ['title' => 'Hospitality'],
            ['title' => 'Transportation'],
            ['title' => 'Energy'],
            ['title' => 'Agriculture'],
            ['title' => 'Environmental Services'],
            ['title' => 'Construction Management'],
            ['title' => 'Information Technology'],
            ['title' => 'Healthcare'],
            ['title' => 'Engineering'],
        ];

        foreach ($categories as $category) {
            JobCategory::create($category);
        }
    }
}
