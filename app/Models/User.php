<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
     
    protected $fillable = [
        'first_name',
        'last_name',
        'image_url',
        'email',
        'password',
        'accept'
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

    public function gradebook() {
        return $this->hasOne(Gradebook::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }


    public function scopeSearchByName($query, $name = '') {
        if($name) {
            $query->where('first_name', 'like', "%$name%")->orWhere('last_name', 'like', "%$name%");
        }
        return $query;
    }



}
