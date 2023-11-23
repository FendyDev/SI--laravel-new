<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_folder',
        'nama_file',
        'role'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
