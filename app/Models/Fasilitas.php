<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    //

    public function wisatas()
    {
        return $this->hasMany(FasilitasWisata::class);
    }
}
