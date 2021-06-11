<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';
    protected $primaryKey = 'idGaji';
    protected $fillable =
    [
        'pegawai_id',
        'gajibulan',
        'bulan',
        'totaluangmakan',
        'totalgajilembur',
        'totalbonusproyek',
        'totalthr',
        'potongantelat',
        'totalgaji',

    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'pegawai_id');
    }
}
