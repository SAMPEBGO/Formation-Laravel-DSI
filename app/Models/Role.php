<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    protected $fillable = ["role"];


    //fonction users
    public function users()
    {

        return $this->hasMany(Role::class);
    }
}


