<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'admin@admin.com',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@admin.com'),
        ]);
    }
}
