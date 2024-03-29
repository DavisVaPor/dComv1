<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'asunto',
        'tipo',
        'fechaCreacion',
        'estado',
        'user_id',
        'commission_id'
    ];
    
    public function commission(){
        return $this->belongsTo(Commission::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function actas(){
        return $this->hasMany(Acta::class);
    }

    public function measurements(){
        return $this->hasMany(Measurement::class);
    }
    public function observations(){
        return $this->morphMany(Observation::class,'observationable');
    }

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }

    public function downlog()
    {
        return $this->hasMany(DownLog::class);
    }

    public function requirements(){
        return $this->hasMany(Requirement::class);
    }

    public function maintenances(){
        return $this->hasMany(EquipamentMaintenance::class);
    }

    public function movimient()
    {
        return $this->hasMany(Movements::class);
    }

    public function mantenimient(){
        return $this->hasOne(Mantenimient::class);
    }
}
