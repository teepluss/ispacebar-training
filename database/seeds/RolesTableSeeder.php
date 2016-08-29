<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'slug' => 'member',
            'name' => 'Member',
            'permissions' => [
                'blogs.view'    => 1,
                'blogs.write'   => 1,
                'blogs.approve' => 0
            ]
        ]);

        Role::create([
            'slug' => 'editor',
            'name' => 'Editor',
            'permissions' => [
                'blogs.view'    => 1,
                'blogs.write'   => 1,
                'blogs.approve' => 1
            ]
        ]);

        Role::create([
            'slug' => 'admin',
            'name' => 'Admin',
            'permissions' => [
                'superadmin'    => 1,
                'blogs.view'    => 1,
                'blogs.write'   => 1,
                'blogs.approve' => 1
            ]
        ]);
    }
}
