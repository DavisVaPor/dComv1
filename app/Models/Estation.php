<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitud',
        'longitud',
        'altitud',
        'estado',
        'urlgooglearth',
        'tipo',
        'terreno',
        'ubigeo_id',
    ];
    
    public function ubigeo()
    {
        return $this->belongsTo(Ubigee::class);
    }

    public function observation()
    {
        return $this->hasMany(Observation::class);
    }

    public function commissions()
    {
        return $this->belongsToMany(Commission::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function observations()
    {
        return $this->morphMany(Observation::class, 'observationable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function actas()
    {
        return $this->hasMany(Acta::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }
    
    public function downlog()
    {
        return $this->hasMany(DownLog::class);
    }

    public function requeriments(){
        return $this->hasMany(Requirement::class);
    }

    public function movimient()
    {
        return $this->hasMany(Movements::class);
    }

    public function mantenimient(){
        return $this->hasMany(Mantenimient::class);
    }
}
