<?php
class Post extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'author_id'];
}