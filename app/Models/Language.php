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
    
    /**
     * scope Selection
     * return a selection list 
     * @param  mixed $query
     * @return void
     */
    public function scopeSelection($query){
        return $query->select('id','abbr','name','direction','active');
    }    
    /**
     * scope Active
     * return active Language onley
     * @param  mixed $query
     * @return void
     */
    public function scopeActive($query){
        return $query->where('active',1);
    }    
    /**
     * getActiveAttribute
     * return motator of active vlaue 
     * @param  mixed $val
     * @return string
     */
    public function getActiveAttribute($val){
         return $val== 1 ? 'active':'not active';
    }   
   /**
    * getDirectionAttribute
    * return motator of Direction vlaue
    * @param  mixed $val
    * @return string
    */
   public function getDirectionAttribute($val){
    return $val =='ltr'?'Lift To right':'Right To Lift';
   }
}
