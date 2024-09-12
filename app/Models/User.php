<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens; Agregamos passport
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function AauthAcessToken(){
          return $this->hasMany('App\OauthAccessToken');

    }

    public function rolUser(){
        return $this->hasMany(RolUser::class);
    }

    public function getRol(){
        $rolArr = $this->rolUser->pluck('rol_id');
        $idRols = [];
        foreach ($rolArr as $value) {
            array_push($idRols,$value->rol_id)  ;
        }
        $rolStr = Rol::whereIn('rol_id', $rolArr)->get();
        return $rolStr;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fatherLastName',
        'motherLastName'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
