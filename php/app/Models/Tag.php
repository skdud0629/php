<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name','slug'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, );
    }
    // Uncomment the line below if you want to use the HasFactory trait
//    use HasFactory;
}
