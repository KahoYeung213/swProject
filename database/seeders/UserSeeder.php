<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Role;
use App\Models\User; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_lecturer = new Role();
        $role_lecturer->name = 'lecturer';
        $role_lecturer->description = 'A lecturer';
        $role_lecturer->save();

        $role_student = new Role();
        $role_student->name = 'student';
        $role_student->description = 'A student';
        $role_student->save();

        $role_lecturer = Role::where('name', 'lecturer')->first();
        $role_student = Role::where('name', 'student')->first();

        $lecturer = new User();
        $lecturer->name = 'lecturer A';
        $lecturer->email = 'lecturera@gmail.com';
        $lecturer->password = Hash::make('password');
        $lecturer->save();
        
        $lecturer->roles()->attach($role_lecturer);

        $student = new User();
        $student->name = 'student A';
        $student->email = 'studenta@gmail.com';
        $student->password = Hash::make('password');
        $student->save();
        // attach the student role to this student
        $student->roles()->attach($role_student);


    }

    
}
