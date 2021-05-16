<?php

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
        \App\User::insert([
      [
        'email'  => 'admin@gmail.com',
        'password' => bcrypt('admin'),
        'pegawai_id'  => '1',
        'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
         ],
      ]);
    }
}
