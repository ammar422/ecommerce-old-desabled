<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

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
    public function getActiveAttribute($val){
         return $val== 1 ? 'active':'not active';
    }
   public function getDirectionAttribute($val){
    return $val =='ltr'?'Lift To right':'Right To Lift';
   }
}
