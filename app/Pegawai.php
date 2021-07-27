<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'nama',
        'nik',
        'idJabatan',
        'pasfoto',
        'jeniskelamin',
        'tempatlahir',
        'tanggallahir',
        'alamat',
        'agama',
        'telp',
        'tanggalgabung',
        'statuskerja',

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

    public function user()
    {
        return $this->hasOne('App\User', 'nik');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan','idJabatan');
    }
    public function proyek()
    {
        return $this->hasMany('App\Proyek','nik');
    }
    public function gaji()
    {
        return $this->hasMany('App\Gaji','nik');
    }
    public function riwayatpendidikan()
    {
        return $this->hasMany('App\Riwayatpendidikan', 'nik');
    }
    public function detailkehadiran()
    {
        return $this->hasMany('App\DetailKehadiran','nik');
    }
}
