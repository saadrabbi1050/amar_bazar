<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN = 1 ; 
    const EDITOR = 2; 
    const USER = 3;

    public function isAdmin()
    {
        if(auth()->user()->role_id == self::ADMIN){
            return true;
        }
    }

    public function isEditor(){
        if(auth()->user()->role_id == self::EDITOR){
            return true;
        }
    }

    public function isUser(){
        if(auth()->user()->role_id == self::USER){
            return true;
        }
    }




    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /// relationship 

    public function contact(){
      return  $this->hasOne(Contact::class);
    }
    
}
