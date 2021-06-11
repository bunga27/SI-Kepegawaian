<?php

use Illuminate\Database\Seeder;

class JabatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Jabatan::insert([
            [
                'idJabatan'=>'1',
                'jabatan' => 'Konsultan',
                'gajiharian' => '1000000',
                'gajilembur' => '100000',
                'bonusproyek' => '100000',
                'uangmakan'  => '100000',
                'hariraya'=>'100000',
                'potongantelat'=>'1000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
