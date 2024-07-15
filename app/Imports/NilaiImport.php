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
            if (count($row) < 4) {
                throw new Exception('Baris data tidak lengkap: ' . json_encode($row));
            }

            // Debugging output
            var_dump($row);

            $siswa = Siswa::where('nama_lengkap', $row[0])->first();
            if (!$siswa) {
                throw new Exception('Nama siswa tidak tersedia: ' . $row[0]);
            }

            $tahunAjaran = TahunAjaran::where('tahun', $row[3])->first();
            if (!$tahunAjaran) {
                throw new Exception('Tahun ajaran tidak tersedia: ' . $row[3]);
            }

            $nilaiTypes = [
                1 => 'Harian',
                2 => 'Ujian Harian',
                3 => 'Ujian Tengah Semester',
                4 => 'Ujian Akhir Semester'
            ];

            if (array_key_exists($this->data['nilai'], $nilaiTypes)) {
                $nilaiName = $nilaiTypes[$this->data['nilai']];
                Nilai::create([
                    'nama' => $nilaiName,
                    'keterangan' => $row[1],
                    'tingkat' => $this->data['tingkat'],
                    'semester' => $this->data['semester'],
                    'nilai' => $row[2],
                    'mapel_id' => $this->data['mapel'],
                    'tahun_ajaran_id' => $tahunAjaran->id,
                    'siswa_id' => $siswa->id,
                ]);
            } else {
                throw new Exception('Nilai type tidak valid: ' . $this->data['nilai']);
            }
        }
    }
}