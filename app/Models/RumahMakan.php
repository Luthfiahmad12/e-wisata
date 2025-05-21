<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahMakan extends Model
{
    public function details()
    {
        return $this->hasMany(FasilitasRumahMakan::class);
    }
}
