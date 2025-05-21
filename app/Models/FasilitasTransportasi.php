<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasTransportasi extends Model
{
    public function transportasi()
    {
        return $this->belongsTo(Transportasi::class);
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
