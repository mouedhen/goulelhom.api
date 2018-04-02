<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        \App\Models\Auth\Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        $admin = [
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Have full control over the application'
        ];

        $manager = [
            'name' => 'manager',
            'display_name' => 'Manager',
            'description' => 'Have full control over the application except users management'
        ];

        $employee = [
            'name' => 'employee',
            'display_name' => 'Employee',
            'description' => 'Advanced user'
        ];

        $user = [
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Basic user'
        ];

        \App\Models\Auth\Role::create($admin);
        \App\Models\Auth\Role::create($manager);
        \App\Models\Auth\Role::create($employee);
        \App\Models\Auth\Role::create($user);
    }
}
