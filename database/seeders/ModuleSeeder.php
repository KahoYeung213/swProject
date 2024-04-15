<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


// use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Module::factory()->count(9)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
