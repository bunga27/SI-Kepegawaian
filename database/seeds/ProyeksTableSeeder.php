<?php

use Illuminate\Database\Seeder;

class ProyeksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Proyek::insert([
            [
                'client'=>'Geovanni',
                'nama'=>'Rumah',
                'alamat'=>'Malang',
                'tanggalpengerjaan'=>'2021-05-05',
                'pegawai_id'  => '1',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
