<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeSelection($query)
    {
        return $query->select('id', 'name', 'translation_lang', 'slug', 'photo', 'active');
    }

    protected function photo():Attribute
    {
        return Attribute::make(
            get: fn($val) => "http://localhost/ecommerce/uploads/admin/" . $val 
        );
    }
}
