<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $typeAdmin = 'admin';
        $typeTeacher = 'teacher';
        $typeStudent = 'student';

        $admin = [
            [
                'name' => 'Admin','email' => 'admin@gmail.com',
                'username' => 'admin','password' => Hash::make('Admin@12'),
            ]
        ];

        foreach ($admin as $item)
        {
            $user = User::create($item);
            $user->assignRole($typeAdmin);
        }

        $teacher = [
            [
                'name' => 'N.T.An','email' => 'teacher1@gmail.com',
                'username' => 'teacher1','password' => Hash::make('Dodoandc@1234'),
            ],
            [
                'name' => 'K.H.Dương','email' => 'teacher2@gmail.com',
                'username' => 'teacher2','password' => Hash::make('Dodoandc@1234'),
            ]
        ];

        foreach ($teacher as $item)
        {
            $user = User::create($item);
            $user->assignRole($typeTeacher);
        }

        $student = [
            [
                'name' => 'Student 1','email' => 'student1@gmail.com',
                'username' => 'student1','password' => Hash::make('Student@12'),
            ],
            [
                'name' => 'Student 2','email' => 'student2@gmail.com',
                'username' => 'student2','password' => Hash::make('Student@12'),
            ]
        ];
        foreach($student as $item) {
            $user = User::create($item);
            $user->assignRole($typeStudent);
        }
    }
}
