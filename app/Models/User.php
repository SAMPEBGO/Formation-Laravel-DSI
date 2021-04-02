<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //fonction produits
    public function produits()
    {

        return $this->belongsToMany(Produit::class);
    }

    //fonction role
    public function role()
    {

        return $this->belongsTo(Role::class);
    }


    //fonction role
    public function isAdmin()
    {
        // dd($this->role->role);

       if($this->role->role=="admin" OR $this->role->role=="super-admin")
        return true;
       else
        return false;
    }
}


