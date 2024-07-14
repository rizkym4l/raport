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
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

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
            if (count($row) < 3) {
                throw new Exception('Baris data tidak lengkap: ' . json_encode($row));
            }

            $siswa = Siswa::where('nama_lengkap', $row[0])->first();
            if (!$siswa) {
                throw new Exception('Nama siswa tidak tersedia: ' . $row[0]);
            }



            $tahunAjaran = TahunAjaran::where('tahun', $row[3])->first();
            if (!$tahunAjaran) {
                throw new Exception('Tahun ajaran tidak tersedia: ' . $row[3]);
            }
            if ($this->data['nilai'] == 1) {
                $this->data['nilai'] = 'Harian';
                Nilai::create([
                    'nama' => $this->data['nilai'],
                    'keterangan' => $row[1],
                    'tingkat' => $this->data['tingkat'],
                    'semester' => $this->data['semester'],
                    'nilai' => $row[2],
                    'mapel_id' => $this->data['mapel'],
                    'tahun_ajaran_id' => $tahunAjaran->id,
                    'siswa_id' => $siswa->id,
                ]);
            }
            if ($this->data['nilai'] == 2) {
                $this->data['nilai'] = 'Ujian Harian';
                Nilai::create([
                    'nama' => $this->data['nilai'],
                    'keterangan' => $row[1],
                    'tingkat' => $this->data['tingkat'],
                    'semester' => $this->data['semester'],
                    'nilai' => $row[2],
                    'mapel_id' => $this->data['mapel'],
                    'tahun_ajaran_id' => $tahunAjaran->id,
                    'siswa_id' => $siswa->id,
                ]);

            }
            if ($this->data['nilai'] == 3) {
                $this->data['nilai'] = 'Ujian Tengah Semester';
                Nilai::create([
                    'nama' => $this->data['nilai'],
                    'keterangan' => $row[1],
                    'tingkat' => $this->data['tingkat'],
                    'semester' => $this->data['semester'],
                    'nilai' => $row[2],
                    'mapel_id' => $this->data['mapel'],
                    'tahun_ajaran_id' => $tahunAjaran->id,
                    'siswa_id' => $siswa->id,
                ]);

            }
            if ($this->data['nilai'] == 4) {
                $this->data['nilai'] = 'Ujian Akhir Semester';
                Nilai::create([
                    'nama' => $this->data['nilai'],
                    'keterangan' => $row[1],
                    'tingkat' => $this->data['tingkat'],
                    'semester' => $this->data['semester'],
                    'nilai' => $row[2],
                    'mapel_id' => $this->data['mapel'],
                    'tahun_ajaran_id' => $tahunAjaran->id,
                    'siswa_id' => $siswa->id,
                ]);

            }

        }
    }
}
