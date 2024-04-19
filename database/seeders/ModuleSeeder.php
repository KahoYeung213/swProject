<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Course;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Retrieve all available courses
        $courses = Course::all();

        // Create 9 modules and associate each with a different random course
        Module::factory()->count(9)->create()->each(function ($module) use ($courses) {
            // Take a random course from the collection of courses
            $randomCourse = $courses->random();

            // Associate the module with the selected course
            $module->course_id = $randomCourse->id;
            $module->save();
        });

        // Create 1 module associated with a random course
        Module::factory()->create([
            'course_id' => Course::inRandomOrder()->first()->id,
        ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
