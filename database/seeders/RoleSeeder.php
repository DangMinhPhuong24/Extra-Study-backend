<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $typeAdmin = 'admin';
        $typeTeacher = 'teacher';
        $typeStudent = 'student';

        $roles = [
            [
                'name' => $typeAdmin,
                'display_name' => 'Quản trị'
            ],
            [
                'name' => $typeTeacher,
                'display_name' => 'Giáo viên'
            ],
            [
                'name' => $typeStudent,
                'display_name' => 'Học sinh'
            ]
        ];
        foreach($roles as $role) {
            Role::create($role);
        }

        $roleTeacher = Role::findOrFail(2);
        $this->syncPermissionsForRole($roleTeacher, [
            'module_chats.chat_all',
            'module_registers.teacher_management',
            'module_registers.subject_management',
            'module_registers.study_time_management',
        ]);

        $roleStudent = Role::findOrFail(3);
        $this->syncPermissionsForRole($roleStudent, [
            'module_chats.chat_all',
            'module_registers.register_user_management.all',
            'module_registers.register_user_management.index',
            'module_registers.register_user_management.store',
            'module_registers.register_user_management.show',
            'module_registers.register_user_management.update',
            'module_registers.register_user_management.destroy',
            'module_registers.teacher_management',
            'module_registers.subject_management',
            'module_registers.study_time_management',
        ]);
    }

    /**
     * @param $role
     * @param array $permissions
     * @return void
     */
    private function syncPermissionsForRole($role, array $permissions): void
    {
        if ($role->permissions->count() == 0) {
            $role->syncPermissions($permissions);
        }
    }
}
