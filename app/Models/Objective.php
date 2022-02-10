<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'commission_id'
    ];

    public function commission(){
        return $this->belongsToMany(Commission::class);
    }
}
