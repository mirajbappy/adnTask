<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'System Admin',
            'email' => 'systemadmin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'system_admin',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
