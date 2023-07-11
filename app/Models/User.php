<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN = 1;
    const MITRA = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone_number',
        'address',
        'avatar'
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

    public function getAvatarImageAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        } else {
            return asset('assets/images/defaultAvatar.png');
        }
    }

    public function getJoinedSinceAttribute()
    {
        $join_date = $this->created_at ? Carbon::parse($this->created_at)->locale('id')->isoFormat('D MMMM Y') : Carbon::parse(now())->locale('id')->isoFormat('D MMMM Y');
        return $join_date;
    }

    public function getRoleNameAttribute()
    {
        if($this->role == 1){
            return 'Admin';
        } else {
            return 'Mitra Panen';
        }
    }
}
