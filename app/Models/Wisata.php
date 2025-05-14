<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    public function details()
    {
        return $this->hasMany(FasilitasWisata::class);
    }
}
