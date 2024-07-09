<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';

    protected $fillable = [
        'nama',
        'kode_mapel'
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
