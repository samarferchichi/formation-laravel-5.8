<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function Posts()
    {
        return $this->hasMany(\App\Post::class);
    }

  //  public function roles()
   // {
    //    return $this->belongsToMany(Role::class)->withTimesTamps();
   // }

   public function roles()
   {
       return $this->belongsToMany(Role::class)->withPivot(['name'])->withTimesTamps();
   }

}
