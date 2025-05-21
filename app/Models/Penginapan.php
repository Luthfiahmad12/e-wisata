<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    public function details()
    {
        return $this->hasMany(FasilitasPenginapan::class);
    }
}
