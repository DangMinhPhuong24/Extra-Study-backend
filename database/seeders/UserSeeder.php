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

        $users = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin@12'),
                'role_id'  => 1,
            ],
            [
                'name' => 'N.T.An',
                'username' => 'teacher1',
                'email' => 'teacher1@gmail.com',
                'password' => Hash::make('Teacher@1234'),
                'role_id'  => 2,
            ],
            [
                'name' => 'K.H.Dương',
                'username' => 'teacher2',
                'email' => 'teacher2@gmail.com',
                'password' => Hash::make('Teacher@1234'),
                'role_id'  => 2,
            ],
            [
                'name' => 'Student 1',
                'username' => 'student1',
                'email' => 'student1@gmail.com',
                'password' => Hash::make('Student@12'),
                'role_id'  => 3,
            ],
            [
                'name' => 'Student 2',
                'username' => 'student2',
                'email' => 'student2@gmail.com',
                'password' => Hash::make('Student@12'),
                'role_id'  => 3,
            ]
        ];
        foreach($users as $user) {
            User::create($user);
        }
    }
}
