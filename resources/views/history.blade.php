@extends('layouts.app')

@section('title', 'History Nilai')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-4 text-blue-600 py-10">History Nilai</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">History Perubahan Nilai</h2>

            <div class="mb-6">
                <p class="text-lg"><strong>Nama Siswa:</strong> {{ $nilai->siswa->nama_lengkap }}</p>
                <p class="text-lg"><strong>Mata Pelajaran:</strong> {{ $nilai->mapel->nama }}</p>
            </div>

            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 text-sm">
                        <th class="py-3 px-6">Diperbarui Oleh</th>
                        <th class="py-3 px-6">Nilai Sebelum</th>
                        <th class="py-3 px-6">Nilai Sesudah</th>
                        <th class="py-3 px-6">Waktu Update</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($history as $log)
                        <tr class="border-b">
                            <td class="py-3 px-6">{{ $log->user->name }}</td>
                            <td class="py-3 px-6">{{ $log->nilai_before }}</td>
                            <td class="py-3 px-6">{{ $log->nilai_after }}</td>
                            <td class="py-3 px-6">{{ $log->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">No history found for this nilai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('nilai.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Back to Nilai</a>
            </div>
        </div>
    </div>
@endsection
