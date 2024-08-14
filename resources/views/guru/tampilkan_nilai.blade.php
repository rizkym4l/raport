@extends('layouts.app')

@section('title', 'Tampilkan Nilai')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M14.348 14.849l-4.197-4.197-4.197 4.197-1.414-1.414 4.197-4.197-4.197-4.197 1.414-1.414 4.197 4.197 4.197-4.197 1.414 1.414-4.197 4.197 4.197 4.197z" />
                    </svg>
                </span>
            </div>
        @endif
        <h1 class="text-4xl font-bold text-center mb-4 text-blue-600 py-10">Tampilkan Nilai</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Identitas Siswa</h2>

            <div class="mb-4">
                <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                <p><strong>Nama Lengkap:</strong> {{ $siswa->nama_lengkap }}</p>
                <p><strong>Kelas:</strong> {{ $siswa->kelas->nama_kelas }}</p>
            </div>

            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Nilai Siswa</h2>

            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mapel
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                            Nilai</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Keterangan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilaiSiswa as $nilai)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $mapel['nama'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->semester }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->jenis_nilai }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap {{ $nilai->nilai < $nilai->mapel->kkm ? 'text-red-500' : '' }}">
                                {{ $nilai->nilai }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->keterangan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('nilai.edit', $nilai->id) }}" class="text-blue-500">Edit</a> |
                                <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus nilai ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
