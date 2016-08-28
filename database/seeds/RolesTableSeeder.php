<?php

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
        \DB::table('roles')->insert([
            'name' => 'admin',
            'permissions' => null
        ]);

        \DB::table('roles')->insert([
            'name' => 'editor',
            'permissions' => null
        ]);

        \DB::table('roles')->insert([
            'name' => 'member',
            'permissions' => null
        ]);
    }
}
