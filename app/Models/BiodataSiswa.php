<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap', 'jurusan', 'kelas', 'foto_profil',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
