<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_instalacion',
        'article_id',
        'estation_id',
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
