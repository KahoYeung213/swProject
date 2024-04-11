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
        $role_lecturer = Role::where('name','lecturer')->first();
        $role_student = Role::where('name', 'user')->first();

        $lecturer = new User();
        $lecturer->name = 'lecturer A';
        $lecturer->email = 'lecturerA@gmail.com';
        $lecturer->password = Hash::make('password');
        $lecturer->save();

        $lecturer->roles()->attach($role_lecturer);


        $role_student = Role::where('name','student')->first();
        $role_student = Role::where('name', 'user')->first();

        $student = new User();
        $student->name = 'student A';
        $student->email = 'studentA@gmail.com';
        $student->password = Hash::make('password');
        $student->save();

        $student->roles()->attach($role_student);

        
    }
}
