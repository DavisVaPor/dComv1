<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'estation_id',
        'imageable_id',
        'imageable_type'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
    
    public function estation(){
        return $this->belongsTo(Estation::class);
    }
}
