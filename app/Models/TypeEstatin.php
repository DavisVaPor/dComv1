<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEstatin extends Model
{
    use HasFactory;

    public function estation()
    {
        return $this->hasMany(Estation::class);
    }
}
