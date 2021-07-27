<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayatpendidikan extends Model
{
    protected $table = 'riwayatpendidikan';
    protected $primaryKey = 'idRiwayatPendidikan';
    protected $fillable = [
        'nik','jenjang','tempat','tahun'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai','nik');
    }
}

