<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'idJabatan';
    protected $fillable =
    [

        'jabatan',
        'gajiharian',
        'gajilembur',
        'bonusproyek',
        'uangmakan',
        'hariraya',
        'potongantelat'

    ];

    public function pegawai()
    {
        return $this->hasMany('App\Pegawai', 'idJabatan');
    }
}
