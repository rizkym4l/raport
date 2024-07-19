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

            // dd($this->data);
            // die();

            $siswa = Siswa::where('nis', $row[0])->first();
            if (!$siswa) {
                throw new Exception('nis tidak tersedia: ' . $row[0]);
            }

            $tahunAjaran = TahunAjaran::where('tahun', $row[3])->first();
            if (!$tahunAjaran) {
                throw new Exception('Tahun ajaran tidak tersedia: ' . $row[3]);
            }

            $nilaiTypes = [
                1 => 'sumatif1',
                2 => 'sumatif2',
                3 => 'sumatif3',
                4 => 'formatif1',
                5 => 'formatif2',
                6 => 'formatif3',
                7 => 'sumatiftengahsemester',

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
                    'nis_siswa' => $siswa->nis,
                ]);
            } else {
                throw new Exception('Nilai type tidak valid: ' . $this->data['nilai']);
            }
        }
    }
}