<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiHistory extends Model
{
    use HasFactory;
    protected $table = 'nilai_history';
    protected $fillable = [
        'nilai_siswa_id',
        'user_id',
        'nilai_before',
        'nilai_after',
    ];

    public function nilaiSiswa()
    {
        return $this->belongsTo(NilaiSiswa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
