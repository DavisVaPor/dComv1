<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'ubicacion',
        'fecha',
        'tema',
        'ubigee_id',
        'report_id',
    ];
    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function ubigee()
    {
        return $this->belongsTo(Ubigee::class);
    }
}
