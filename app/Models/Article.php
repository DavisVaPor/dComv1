<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'codPatrimonial',
        'denominacion',
        'cantidad',
        'marca',
        'modelo',
        'category_id',
        'color',
        'nserie',
        'estado',
        'estation_id',
        'system_id',
    ];


    public function system()
    {
        return $this->belongsTo(System::class);
    }

    public function estation()
    {
        return $this->belongsTo(Estation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function commissions()
    {
        return $this->belongsToMany(Commission::class);
    }

    public function observations()
    {
        return $this->morphMany(Observation::class, 'observationable');
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function manintenance()
    {
        return $this->hasMany(EquipamentMaintenance::class);
    }

    public function installation()
    {
        return $this->hasMany(InstallationLog::class);
    }
}
