<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user->name = "Mauro";
        $user->lastname = "Yini";
        $user->telephone = "2235769157";
        $user->email = "mauroyini@hotmail.com";
        $user->password = bcrypt('123123');
        $user->status='1';
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
