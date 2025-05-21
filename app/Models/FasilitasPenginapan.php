<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasPenginapan extends Model
{
    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class);
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
