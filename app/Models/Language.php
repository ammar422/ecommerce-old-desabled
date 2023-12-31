<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'abbr' ,
        'local',
        'name',
        'direction',
        'active',
    ];
    protected $hidden=[

    ];

    public function scopeActive($query){
        return $query->where('active',1);
    }
    
}
