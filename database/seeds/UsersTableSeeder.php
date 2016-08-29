<?php

use App\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::whereSlug('admin')->first();
        $editorRole = Role::whereSlug('editor')->first();
        $memberRole = Role::whereSlug('member')->first();

        $user1 = User::create([
            'name'       => 'Teepluss',
            'first_name' => 'Tee',
            'last_name'  => 'Pluss',
            'email'      => 'teepluss@gmail.com',
            'password'   => '123456'
        ]);
        $user1->roles()->attach($adminRole);

        $user2 = User::create([
            'name'       => 'John',
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'john@gmail.com',
            'password'   => '123456'
        ]);
        $user2->roles()->attach($editorRole);

        $user3 = User::create([
            'name'       => 'Jane',
            'first_name' => 'Jane',
            'last_name'  => 'Doe',
            'email'      => 'Jane@gmail.com',
            'password'   => '123456'
        ]);
        $user3->roles()->attach($memberRole);
    }
}
