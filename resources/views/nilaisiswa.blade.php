@extends('layouts.app')

@section('title', 'Data Nilai')

@section('contents')
    <div class="container mx-auto px-4 py-8 h-full">
        <h1 class="text-3xl font-semibold text-center mb-8">Data Nilai</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>
                        <th class="py-2 px-4 border-b">Tingkat</th>
                        <th class="py-2 px-4 border-b">Semester</th>
                        <th class="py-2 px-4 border-b">Nilai</th>
                        <th class="py-2 px-4 border-b">Mapel ID</th>
                        <th class="py-2 px-4 border-b">Tahun Ajaran ID</th>
                        <th class="py-2 px-4 border-b">Siswa ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->keterangan }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->tingkat }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->semester }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->nilai }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->mapel_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->tahun_ajaran_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->siswa_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
