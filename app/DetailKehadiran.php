<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKehadiran extends Model
{
    protected $table = 'detailkehadiran';
    protected $primaryKey = 'idDetailKehadiran';
    protected $fillable =
    [
        'nik',
        'bulan',
        'buktidatang',
        'ketdatang',
        'buktipulang',
        'ketpulang',
        'keterangan',
        'ketepatanhadir'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai','nik');
    }

}
