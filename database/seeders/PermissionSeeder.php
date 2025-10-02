<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('model_has_permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissionsCategories = [
            [
                'name' => 'module_chats',
                'display_name' => 'Quản lý chat',
                'children' => [
                    [
                        'name' => 'module_chats.chat_all',
                        'display_name' => 'Hiển thị chat',
                    ]
                ],
            ],
            [
                    'name' => 'module_registers',
                    'display_name' => 'Quản lý đăng ký',
                    'children' => [
                        [
                            'name' => 'module_registers.register_user_management',
                            'display_name' => 'Quản lý đăng ký',
                            'children' => [
                                [
                                    'name' => 'module_registers.register_user_management.all',
                                    'display_name' => 'Danh sách tất cả để đăng ký',
                                ],
                                [
                                    'name' => 'module_registers.register_user_management.index',
                                    'display_name' => 'Danh sách đã đăng ký',
                                ],
                                [
                                    'name' => 'module_registers.register_user_management.store',
                                    'display_name' => 'Đăng ký môn học',
                                ],
                                [
                                    'name' => 'module_registers.register_user_management.show',
                                    'display_name' => 'Chi tiết đăng ký môn học',
                                ],
                                [
                                    'name' => 'module_registers.register_user_management.update',
                                    'display_name' => 'Sửa đăng ký môn học',
                                ],
                                [
                                    'name' => 'module_registers.register_user_management.destroy',
                                    'display_name' => 'Xóa đăng ký môn học',
                                ],
                            ],
                        ],
                        [
                            'name' => 'module_registers.teacher_management',
                            'display_name' => 'Quản lý giáo viên',
                        ],
                        [
                            'name' => 'module_registers.subject_management',
                            'display_name' => 'Quản lý môn học',
                        ],
                        [
                            'name' => 'module_registers.study_time_management',
                            'display_name' => 'Quản lý thời gian học',
                        ]
                    ],
            ],
            [
                'name' => 'module_account',
                'display_name' => 'Quản lý Tài khoản',
                'children' => [
                    [
                        'name' => 'module_account.account_management',
                        'display_name' => 'Quản lý Tài khoản',
                    ]
                ]
            ]
        ];

        foreach ($permissionsCategories as $eachPermission)
        {
            $this->createPermissionWithChildren($eachPermission);
        }
    }

     /**
     * @param $permissionData
     * @param $parentId
     * @return void
     */
    public function createPermissionWithChildren($permissionData, $parentId = null): void
    {
        $permissionParent = Permission::updateOrCreate(
            ['name' => $permissionData['name']],
            [
                'display_name' => $permissionData['display_name'],
                'parent_id' => $parentId,
            ]
        );

        if(!empty($permissionData['children']))
        {
            foreach ($permissionData['children'] as $childData)
            {
                $this->createPermissionWithChildren($childData, $permissionParent->id);
            }
        }
    }
}
