<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailproyek extends Model
{
    protected $table = 'detailproyek';
    protected $primaryKey = 'idDetailProyek';
    protected $fillable =
    [
        'idProyek',
        'tanggal',
        'idAlurProyek',
        'keterangan',
        'gambar'
    ];

    public function proyek()
    {
        return $this->belongsTo('App\Proyek','idProyek');
    }

    public function alurproyek()
    {
        return $this->belongsTo('App\Alurproyek', 'idAlurProyek');
    }

    public function images(){
        return $this->hasMany('App\Gambarprogres', 'idDetailProyek');
    }
}
