<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class staf extends Authenticatable
{
    use HasFactory;

    protected $table = 'staf';

    protected $fillable = [
        'username',
        'nama_lengkap',
        'password',
        'role',
        'level',
        'image',
    ];

    // protected $hidden = [
    //     'password'
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
