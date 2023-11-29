<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'nama_lengkap',
        'password',
        'role',
        'level',
        'image',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
