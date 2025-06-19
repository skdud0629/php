<?php
namespace App;
protected $fillable = ['name', 'email', 'password']; //? 왜 에러나지

protected $hidden = ['password', 'remember_token'];
