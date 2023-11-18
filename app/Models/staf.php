<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class staf extends Model
{
    use HasFactory;

    protected $table = 'staf';

    protected $fillable = [
        'username',
        'nama_lengkap',
        'password',
        'role',
        'level',
    ];

    // protected $hidden = [
    //     'password'
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
