<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
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


    // filter
    public function scopeFilter($query, $filter) {
        $query->when(request('search'),function($query,$search) {
            $lowercaseAdmin = strtolower('Admin');
            $lowercaseUser = strtolower('User');
            if (strpos($search, $lowercaseAdmin) !== false) {
                $query->where('status', '=', 2); // Admin status is 2
            } elseif (strpos($search, $lowercaseUser) !== false) {
                $query->where('status', '=', 1); // User status is 1
            } else {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            }
        });
    }


    //Accessors
    public function getNameAttribute($value) {
        return ucwords($value);
    }

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
