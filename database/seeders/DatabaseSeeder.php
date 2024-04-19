<?php

namespace Database\Seeders;

use Database\Seeders\ModuleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CourseSeeder::class);

        $this->call(ModuleSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
