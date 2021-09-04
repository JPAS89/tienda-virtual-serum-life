<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //asigma roles a usuarios
        $this->call(RoleTableSeeder::class);
        // $this->call(UsersTableSeeder::class);

        
        //asigna el nombre del rol en variable
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $user = new User();
        $user->name = 'Admin';
        $user->secondName = 'Admin';
        $user->email = 'admin@domain.com';
        $user->address = ('San Carlos'); 
        $user->telephone = ('88888888'); 
        $user->password = bcrypt('admin123'); 
        $user->save();
        $user->roles()->attach($role_admin);
        
        $user1 = new User();
        $user1->name = 'User';
        $user1->secondName = 'user';
        $user1->email = 'user@domain.com';
        $user1->address = ('Alajuela'); 
        $user1->telephone = ('55555555'); 
        $user1->password = bcrypt('user123'); 
        $user1->save();
        $user1->roles()->attach($role_user);
        
        $user->roles()->attach(Role::where('name', 'user')->first());
        $this->call(TiposTableSeeder::class);
    }
}
