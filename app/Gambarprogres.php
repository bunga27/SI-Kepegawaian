<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambarprogres extends Model
{
    protected $table = 'gambarprogres';
    protected $primaryKey = 'idGambarprogres';
    protected $fillable =
    [
        'detailproyek_id',
        'gambar2'
    ];

    public function Detailproyek()
    {
        return $this->belongsTo('App\Detailproyek');
    }
}
