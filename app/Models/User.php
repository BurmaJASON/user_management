<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public $timestamps = true;

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
            $lowercaseApprove = strtolower('Approved');
            $lowercaseReject = strtolower('Rejected');
            $lowercasePending = strtolower('Pending');
            if (strpos($search, $lowercaseApprove) !== false) {
                $query->where('status', '2'); // Approved status is 2
            } elseif (strpos($search, $lowercaseReject) !== false) {
                $query->where('status','1'); // Rejected status is 1
            }elseif (strpos($search, $lowercasePending) !== false) {
                $query->where('status', '0'); // Pending status is 1
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
