<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class NilaiExport implements WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Keterangan',
            'Nilai',
            'Tahun Ajaran',
        ];
    }


}
