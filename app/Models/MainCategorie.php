<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'translation_lang',
        'translation_of',
        'slug',
        'photo',
        'active',
    ];
    protected $hidden = [];

    public function scopeActive($query){
        return $query->where('active',1);
    }
}
