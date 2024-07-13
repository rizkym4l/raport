<?php

namespace App\Imports;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\TahunAjaran;
use Maatwebsite\Excel\Concerns\ToArray;
use Exception;

class NilaiImport implements ToArray
{
    /**
     * @param array $rows
     *
     * @return void
     * @throws Exception
     */
    public function array(array $rows)
    {
        $header = array_shift($rows);

        foreach ($rows as $row) {
            if (count($row) < 8) {
                throw new Exception('Baris data tidak lengkap: ' . json_encode($row));
            }

            $siswa = Siswa::where('nama_lengkap', $row[0])->first();
            if (!$siswa) {
                throw new Exception('Nama siswa tidak tersedia: ' . $row[0]);
            }

            $mapel = Mapel::where('nama', $row[6])->first();
            if (!$mapel) {
                throw new Exception('Mapel tidak tersedia: ' . $row[6]);
            }

            $tahunAjaran = TahunAjaran::where('tahun', $row[7])->first();
            if (!$tahunAjaran) {
                throw new Exception('Tahun ajaran tidak tersedia: ' . $row[7]);
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