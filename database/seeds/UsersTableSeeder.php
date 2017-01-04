<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('user_role')->truncate();

        $role_user = Role::where('name', 'User')->first();
        $role_author = Role::where('name', 'Author')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'Test User';
        $user->email = 'sandergeraedts@live.nl';
        $user->password = bcrypt('T#st1234');
        $user->save();
        $user->roles()->attach($role_user);

        $author = new User();
        $author->name = 'Test Author';
        $author->email = 'sanderge@studentaanhuis.nl';
        $author->password = bcrypt('T#st1234');
        $author->save();
        $author->roles()->attach($role_author);

        $admin = new User();
        $admin->name = 'Sander Geraedts';
        $admin->email = 'info@codepanda.nl';
        $admin->password = bcrypt('T#st1234');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
