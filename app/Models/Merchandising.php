<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandising extends Model
{
    use HasFactory;

    public function livraisons()
    {
        return $this->belongsTo(Livraison::class);
    }

}
