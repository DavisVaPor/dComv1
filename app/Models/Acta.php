<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'estation_id',
        'file_url',
    ];

    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function estation(){
        return $this->belongsTo(Estation::class);
    }
}
