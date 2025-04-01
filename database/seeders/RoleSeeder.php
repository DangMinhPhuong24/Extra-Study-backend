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
        Role::truncate();

        $roles = [
            [
                'role_name' => 'admin',
                'display_name' => 'Quản trị'
            ],
            [
                'role_name' => 'teacher',
                'display_name' => 'Giáo viên'
            ],
            [
                'role_name' => 'student',
                'display_name' => 'Học sinh'
            ]
        ];
        foreach($roles as $role) {
            Role::create($role);
        }
    }
}
