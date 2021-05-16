<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'kehadiran';
    protected $primaryKey = 'idKehadiran';
    protected $fillable = ['tanggalkehadiran'];

    public function detailkehadiran()
    {
        return $this->hasMany('App\DetailKehadiran', 'kehadiran_id');
    }
}


