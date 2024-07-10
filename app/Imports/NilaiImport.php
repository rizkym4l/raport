<?php

namespace App\Imports;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\TahunAjaran;
use Maatwebsite\Excel\Concerns\ToArray;

class NilaiImport implements ToArray
{
    /**
     * @param array $rows
     *
     * @return void
     */
    public function array(array $rows)
    {
        if ($rows[0] === 'Nama') {
            // Jika baris adalah judul, lewati dan jangan membuat model
            return null;
        }

        foreach ($rows as $row) {

            $siswa = Siswa::where('nama_lengkap', $row[0])->first();
            
            // Cari mapel berdasarkan id atau kriteria lain
            $mapel = Mapel::where('nama', $row[5])->first();
            if (!$mapel) {
                // Jika mapel tidak ditemukan, lewati baris ini
                continue;
            }
            
            // Cari tahun ajaran berdasarkan id atau kriteria lain
            $tahunAjaran = TahunAjaran::where('tahun', $row[6])->first();
            if (!$tahunAjaran) {
                // Jika tahun ajaran tidak ditemukan, lewati baris ini
                continue;
            }

            Nilai::create([
                'nama' => $siswa->nama_lengkap, 
                'keterangan' => $row[1], 
                'tingkat' => $row[2], 
                'semester' => $row[3], 
                'nilai' => $row[4], 
                'mapel_id' => $mapel->id,
                'tahun_ajaran_id' => $tahunAjaran->id,
                'siswa_id' => $siswa->id,
            ]);
        }
    }
}