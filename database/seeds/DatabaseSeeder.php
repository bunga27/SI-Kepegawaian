<?php

use App\DetailKehadiran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JabatansTableSeeder::class);
        $this->call(PegawaisTableSeeder::class);
        $this->call(DetailKehadiransTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProyeksTableSeeder::class);

    }
}
