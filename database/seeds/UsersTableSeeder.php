<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get roles
        $adminRole = Role::where('id', 1)->first();
        $teacherRole = Role::where('id', 2)->first();
        $studentRole = Role::where('id', 3)->first();

        // Create users
        //admin
         $admin = User::create([
                 'id'            => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ]);
         $admin->roles()->attach($adminRole);

        // 6 teachers
        for ($i=2; $i<=7; $i++) {
            $teacher = User::create([
                 'id'            => $i,
                'name'           => 'Teacher'.$i,
                'email'          => 'teacher'.$i.'@teacher'.$i.'.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ]);
            $teacher->roles()->attach($teacherRole);
        }

        // 20 students
        for ($i=8; $i<=27; $i++) {
            $student = User::create([
                 'id'            => $i,
                'name'           => 'Student'.$i,
                'email'          => 'student'.$i.'@student'.$i.'.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ]);
            $student->roles()->attach($studentRole);
        }

    }
}
