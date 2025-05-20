<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = ['name'];
    //
    public function wisatas()
    {
        return $this->hasMany(FasilitasWisata::class);
    }
}
