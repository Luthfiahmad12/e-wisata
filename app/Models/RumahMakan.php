<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahMakan extends Model
{
    protected function casts()
    {
        return [
            'menu' => 'json'
        ];
    }

    public function details()
    {
        return $this->hasMany(FasilitasRumahMakan::class);
    }
}
