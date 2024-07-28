<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class NilaiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function collection()
    {
        return Siswa::select('nis')->where('kelas_id', $this->data['kelas'])->get();
    }

    public function headings(): array
    {
        return [
            'Nis Siswa',
            'Keterangan',
            'Nilai',
            'Tahun Ajaran',
        ];
    }


}
