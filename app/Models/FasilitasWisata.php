<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasWisata extends Model
{
    //

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }

    public function fasilitas()
    {
        return $this->belongsTo(fasilitas::class);
    }
}
