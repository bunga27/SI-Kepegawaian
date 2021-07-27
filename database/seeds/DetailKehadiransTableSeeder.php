<?php

use Illuminate\Database\Seeder;

class DetailKehadiransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\DetailKehadiran::insert([
            [
                'idDetailKehadiran' => '1',
                'nik'=> '1234567891234567',
                'buktidatang' => 'bd.png',
                'ketdatang' => 'Pengerjaan Proyek A',
                'buktipulang' => 'bp.png',
                'ketpulang' => 'Progres Proyek A 10%',
                'keterangan'  => 'Lembur',
                'ketepatanhadir' => 'Terlambat',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
