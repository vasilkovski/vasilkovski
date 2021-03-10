<?php

use Illuminate\Database\Seeder;

class admin_table_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')

        ]);
    }
}
