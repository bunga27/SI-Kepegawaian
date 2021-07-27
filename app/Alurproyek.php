<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alurproyek extends Model
{
    protected $table = 'alurproyek';
    protected $primaryKey = 'idAlurProyek';
    protected $fillable =
    [
        'idProyek',
        'tahapan',
        'progres'
    ];

    public function proyek()
    {
        return $this->belongsTo('App\Proyek','idProyek');
    }

    public function detailproyek()
    {
        return $this->hasMany('App\DetailProyek', 'idAlurProyek');
    }

}
