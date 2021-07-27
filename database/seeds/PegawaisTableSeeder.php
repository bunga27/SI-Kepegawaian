<?php

use Illuminate\Database\Seeder;

class PegawaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Pegawai::insert([
            [

                'nama'=>'Bunga Nanda',
                'idJabatan' => '1',
                'pasfoto' => 'BungaNanda.png',
                'nik'=>'1234567891234567',
                'jeniskelamin'=>'Perempuan',
                'tempatlahir'=>'Malang',
                'tanggallahir'=>'2000-01-01',
                'alamat'=>'Jl. Arga Manis 1A no 7',
                'agama'=>'Islam',
                'telp'=>'082134288397',
                'tanggalgabung'=>'2000-01-01',
                'statuskerja'=>'Aktif',

                // 'sd'=>'SDN 02 Kartoharjo',
                // 'smp'=>'SMP N 01 Madiun',
                // 'sma'=>'SMA N 01 Madiun',
                // 'lanjutan'=>'Diploma 3 TI PNM',

                'riwayatpenyakit'=>'-',
                'tinggi'=>'1',
                'berat'=>'1',

                'status'=>'Belum Kawin',
                'tanggungan'=>'2',
                'namawali'=>'Kustia Ningsih',
                'hubungan'=>'Ibu',
                'telpwali'=>'082111122233',
                'alamatwali'=>'Jl. Arga Manis 1A No 7',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
