<?php

use Illuminate\Database\Seeder;

use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'profile_password_edit',
            ],


            // category
            [
                'id'    => '18',
                'title' => 'category_create',
            ],
            [
                'id'    => '19',
                'title' => 'category_edit',
            ],
            [
                'id'    => '20',
                'title' => 'category_show',
            ],
            [
                'id'    => '21',
                'title' => 'category_delete',
            ],
            [
                'id'    => '22',
                'title' => 'category_access',
            ],

            // room
            [
                'id'    => '23',
                'title' => 'room_create',
            ],
            [
                'id'    => '24',
                'title' => 'room_edit',
            ],
            [
                'id'    => '25',
                'title' => 'room_show',
            ],
            [
                'id'    => '26',
                'title' => 'room_delete',
            ],
            [
                'id'    => '27',
                'title' => 'room_access',
            ],

            // course
            [
                'id'    => '28',
                'title' => 'course_create',
            ],
            [
                'id'    => '29',
                'title' => 'course_edit',
            ],
            [
                'id'    => '30',
                'title' => 'course_show',
            ],
            [
                'id'    => '31',
                'title' => 'course_delete',
            ],
            [
                'id'    => '32',
                'title' => 'course_access',
            ],
           
            
        ];

        Permission::insert($permissions);
    }
}
