<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailproyek extends Model
{
    protected $table = 'detailproyek';
    protected $primaryKey = 'idDetailProyek';
    protected $fillable =
    [
        'proyek_id',
        'tanggal',
        'progres',
        'keterangan',
        'gambar'
    ];

    public function proyek()
    {
        return $this->belongsTo('App\Proyek', 'proyek_id');
    }

    public function images(){
        return $this->hasMany('App\Gambarprogres');
    }
}
