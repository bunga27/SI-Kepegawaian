<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'idPegawai';
    protected $fillable = [
        'nama',
        'pasfoto',
        'nik',
        'jeniskelamin',
        'tempatlahir',
        'tanggallahir',
        'alamat',
        'agama',
        'telp',
        'tanggalgabung',
        'statuskerja',


        'sd',
        'smp',
        'sma',
        'lanjutan',

        'riwayatpenyakit',
        'tinggi',
        'berat',

        'status',
        'tanggungan',
        'namawali',
        'hubungan',
        'telpwali',
        'alamatwali'
    ];

    // public function proyek()
    //  {
    //      return $this->hasMany('App\Proyek', 'pegawai_id');
    //  }


    public function user()
    {
        return $this->hasOne('App\User', 'pegawai_id');
    }

    public function proyek()
    {
        return $this->hasMany('App\Proyek', 'pegawai_id');
    }

    public function detailkehadiran()
    {
        return $this->hasMany('App\DetailKehadiran', 'pegawai_id');
    }
}
