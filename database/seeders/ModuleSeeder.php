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
        Module::factory()->count(9)->create(); // Create 9 modules
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Module::factory()->times(1)->create([
            'course_id' => Course::inRandomOrder()->first()->id,
        ]);
    }
}
