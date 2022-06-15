<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'estation_id',
        'report_id',
        'equipment_id',
        'cantidad',
        'descripcion',
    ];
    
    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function estation(){
        return $this->belongsTo(Estation::class);
    }

    public function equipment(){
        return $this->belongsTo(Catalog::class);
    }
}
