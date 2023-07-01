<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'tema',
        'descripcion',
        'ubigee_id',
        'report_id',
        'imagen',
        'merchandising_cantidad',
    ];
    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function ubigee()
    {
        return $this->belongsTo(Ubigee::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function livraisons()
    {
        return $this->belongsTo(Livraison::class);
    }

}
