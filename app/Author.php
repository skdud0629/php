<?php
class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name', 'email', 'bio'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name;
    }
}