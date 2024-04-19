<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course; 

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()
            ->times(3)
            ->create();
    }
}
