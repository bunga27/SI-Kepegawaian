<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKehadiran extends Model
{
    protected $table = 'detailkehadiran';
    protected $primaryKey = 'idDetailKehadiran';
    protected $fillable =
    [
        'kehadiran_id',
        'pegawai_id',
        'ketkehadiran',
        'keterangan'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'pegawai_id');
    }

    public function kehadiran()
    {
        return $this->belongsTo('App\Kehadiran', 'kehadiran_id');
    }
}
