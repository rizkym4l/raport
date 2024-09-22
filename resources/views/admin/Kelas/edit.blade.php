@extends('layouts.main')

@section('contentAdmin')
    <div class="container mx-auto p-6 space-y-6">

        <h2 class="text-2xl font-bold">Formulir Kelas</h2> <!-- Tambahkan heading di sini -->

        <form action="{{ isset($kelas) ? route('kelas.update', $kelas->id) : route('kelas.store') }}" method="POST">
            @csrf
            @if (isset($kelas))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="nama_kelas" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas"
                    value="{{ old('nama_kelas', $kelas->nama_kelas ?? '') }}"
                    class="border border-gray-300 bg-white rounded-lg px-4 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="tingkat" class="block text-sm font-medium text-gray-700">Tingkat</label>
                <input type="number" name="tingkat" id="tingkat" value="{{ old('tingkat', $kelas->tingkat ?? '') }}"
                    class="border border-gray-300 bg-white rounded-lg px-4 py-2 w-full">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('kelas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                    {{ isset($kelas) ? 'Update Kelas' : 'Add Kelas' }}
                </button>
            </div>
        </form>

    </div>
@endsection
