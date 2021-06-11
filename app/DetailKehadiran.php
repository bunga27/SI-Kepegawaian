<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKehadiran extends Model
{
    protected $table = 'detailkehadiran';
    protected $primaryKey = 'idDetailKehadiran';
    protected $fillable =
    [
        'bulan',
        'pegawai_id',
        'buktidatang',
        'ketdatang',
        'buktipulang',
        'ketpulang',
        'keterangan',
        'ketepatanhadir'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'pegawai_id');
    }

}
