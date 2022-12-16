<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = [
        'name',
        'numero',
        'tipo',
        'fechainicio',
        'fechafin',
        'periodo',
        'estado',
        'anho',
        'mes'
    ];

    public function estations(){
        return $this->belongsToMany(Estation::class);
    }

    public function articles(){
        return $this->belongsToMany(Article::class);
    }

    public function objetives(){
        return $this->hasMany(Objective::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
    
    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function ubigee()
    {
        return $this->belongsToMany(Ubigee::class);
    }
}
