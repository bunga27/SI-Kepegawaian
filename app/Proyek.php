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
        'pegawai_id',
        'nama',
        'alamat',
        'tanggalpengerjaan',

    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'pegawai_id');
    }
    public function detailproyek()
    {
        return $this->hasMany('App\DetailProyek', 'proyek_id');
    }
    public function pembiayaan()
    {
        return $this->hasMany('App\Pembiayaan', 'proyek_id');
    }
}
