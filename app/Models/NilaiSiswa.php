<?php

namespace App\Models;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function nilaiNama()
    {
        return $this->belongsTo(Nilai::class, 'nilai_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis_siswa');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }
}
