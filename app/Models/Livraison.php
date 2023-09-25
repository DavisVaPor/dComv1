<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
    protected $fillable = [
        'merchandising_id',
        'promotion_id',
        'cantidad',
    ];

    public function promotions()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function merchandising(){
        return $this->belongsTo(Merchandising::class);
    }
}
