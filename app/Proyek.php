<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'idProyek';
    protected $fillable =
    [

        'client',
        'nik',
        'nama',
        'alamat',
        'tanggalpengerjaan',
        'tanggalberakhir',

        'bulan'

    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai','nik');
    }
    public function detailproyek()
    {
        return $this->hasMany('App\DetailProyek','idProyek');
    }
    public function alurproyek()
    {
        return $this->hasMany('App\DetailProyek', 'idProyek');
    }
    public function pembiayaan()
    {
        return $this->hasMany('App\Pembiayaan', 'idProyek');
    }
}
