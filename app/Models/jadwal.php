<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $table ='jadwal';
    protected $fillable = [
        'role',
        'judul',
        'tanggal',
        'jam',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
