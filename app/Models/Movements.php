<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movements extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_move',
        'tipo_movimiento',
        'article_id',
        'acta',
        'estation_id',
        'estacion_out_id',
        'estacion_out_name',
        'user_id',
        'report_id',
    ];

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function estation()
    {
        return $this->belongsTo(Estation::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
