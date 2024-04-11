<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_lecturer = new Role();
        $role_lecturer->name = 'lecturer';
        $role_lecturer->description = 'A Lecturer';
        $role_lecturer->save();

        $role_student = new Role();
        $role_student->name = 'student';
        $role_student->description = 'A student';
        $role_student->save();
    }
}
