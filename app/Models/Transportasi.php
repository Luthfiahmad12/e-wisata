<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    public function details()
    {
        return $this->hasMany(FasilitasTransportasi::class);
    }
}
