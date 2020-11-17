<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;


class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin: all permissions
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // teacher and student
        // only access and view courses and profile
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 8) == 'profile_' || $permission->title== 'course_access' || $permission->title== 'course_show';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
        Role::findOrFail(3)->permissions()->sync($user_permissions);
    }
}
