<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meeting extends Model
{
    use HasFactory;

    protected $table ='meeting';
    protected $fillable = [
        'role',
        'nama_lengkap',
        'tanggal',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
