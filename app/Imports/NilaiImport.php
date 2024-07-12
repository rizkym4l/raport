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

            $siswa = siswa::where('nama_lengkap', $row[0])->first();
            
            // Cari mapel berdasarkan id atau kriteria lain
            $mapel = Mapel::where('nama', $row[6])->first();
            if (!$mapel) {
                // Jika mapel tidak ditemukan, lewati baris ini
                continue;
            }
            
            // Cari tahun ajaran berdasarkan id atau kriteria lain
            $tahunAjaran = TahunAjaran::where('tahun', $row[7])->first();
            if (!$tahunAjaran) {
                // Jika tahun ajaran tidak ditemukan, lewati baris ini
                continue;
            }

            Nilai::create([
                'nama' => $row[1], 
                'keterangan' => $row[2], 
                'tingkat' => $row[3], 
                'semester' => $row[4], 
                'nilai' => $row[5], 
                'mapel_id' => $mapel->id,
                'tahun_ajaran_id' => $tahunAjaran->id,
                'siswa_id' => $siswa->id,
            ]);
        }
    }
}