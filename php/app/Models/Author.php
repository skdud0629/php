<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['email', 'password'];

    public function authors()
    {
        return $this->belongsTo(User::class,'author_id');
    }

}
