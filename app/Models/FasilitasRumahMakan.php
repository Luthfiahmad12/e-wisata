<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasRumahMakan extends Model
{
    public function rumah_makan()
    {
        return $this->belongsTo(RumahMakan::class);
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
