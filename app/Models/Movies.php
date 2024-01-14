<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'tittle',
        'year',
        'director',
    ];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'categories_movies');
    }
}
