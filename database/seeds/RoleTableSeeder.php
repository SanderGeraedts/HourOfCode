<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'Your default user';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Author';
        $role_user->description = 'An author';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Admin';
        $role_user->description = 'The admin';
        $role_user->save();
    }
}
