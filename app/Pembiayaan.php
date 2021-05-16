<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembiayaan extends Model
{
    protected $table = 'pembiayaan';
    protected $primaryKey = 'idPembiayaan';
    protected $fillable =
    [
        'proyek_id',
        'tanggal',
        'jenispekerjaan',
        'uraianpekerjaan',
        'vol',
        'hargasatuan',
        'hargatotal',
        'nota'

    ];

    public function proyek()
    {
        return $this->belongsTo('App\Proyek', 'proyek_id');
    }
}
