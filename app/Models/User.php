<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Uuid;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Uuid;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthday',
        'gender',
        'password',
        'gender'
    ];

    public function scopeFilter($quary , array $filters){
       if($filters['search'] ?? false){
           $quary->where('name','like','%'.request('search').'%')
           ->orWhere('phone','like','%'.request('search').'%')
           ->orWhere('email','like','%'.request('search').'%');
       }
   }

   public function roles()
   {
       return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
   }
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
        'password' => 'hashed',
    ];
}
