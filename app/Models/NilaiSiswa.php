<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'nilai_siswa';

    protected $fillable = [
        'nilai_id',
        'keterangan',
        'tingkat',
        'semester',
        'nilai',
        'mapel_id',
        'tahun_ajaran_id',
        'nis_siswa',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
