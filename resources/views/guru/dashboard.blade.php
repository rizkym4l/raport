@extends('layouts.app')

@section('title', 'Input Nilai Siswa')

@section('contents')
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">Input Nilai Siswa</h2>
        <form action="{{ route('nilai.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="relative inline-block">
                <input class=" 
                file:bg-white file:text-gray-500 file:border-0
                file:shadow-xl  block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " id="file_input" name="file" type="file">
            </div>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Import</button>
        </form>

        


        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('nilai.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-4xl mx-auto">
            @csrf

            <div id="nilai-entries">
                <div class="nilai-entry">
                    <div class="mb-4">
                        <label for="siswa_id" class="block text-gray-700">Siswa</label>
                        <select name="siswa_id[]" class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white">
                            @foreach ($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mapel_id" class="block text-gray-700">Mata Pelajaran</label>
                        <select name="mapel_id[]" class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white">
                            @foreach ($mapel as $m)
                                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                            @endforeach
                        </select>
                        @error('mapel_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tahun_ajaran_id" class="block text-gray-700">Tahun Ajaran</label>
                        <select name="tahun_ajaran_id[]"
                            class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white">
                            @foreach ($tahun_ajaran as $t)
                                <option value="{{ $t->id }}">{{ $t->tahun }}</option>
                            @endforeach
                        </select>
                        @error('tahun_ajaran_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama Nilai</label>
                        <input type="text" name="nama[]"
                            class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white"
                            value="{{ old('nama') }}">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nilai" class="block text-gray-700">Nilai</label>
                        <input type="number" name="nilai[]"
                            class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white" min="0"
                            max="100" value="{{ old('nilai') }}">
                        @error('nilai')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="block text-gray-700">Keterangan</label>
                        <textarea name="keterangan[]" class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tingkat" class="block text-gray-700">Tingkat</label>
                        <input type="number" name="tingkat[]"
                            class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white"
                            value="{{ old('tingkat') }}">
                        @error('tingkat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="semester" class="block text-gray-700">Semester</label>
                        <input type="number" name="semester[]"
                            class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white"
                            value="{{ old('semester') }}">
                        @error('semester')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <button type="button" id="add-entry"
                    class="bg-red-500 text-white py-2 px-4 rounded hover:bg-blue-600">Tambah Siswa</button>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Simpan
                    Nilai</button>
            </div>
        </form>
    </div>

    <template id="nilai-entry-template">
        <div class="nilai-entry mt-4">
            <hr class="my-4">
            <div class="mb-4">
                <label for="siswa_id" class="block text-gray-700">Siswa</label>
                <select name="siswa_id[]" class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white">
                    @foreach ($siswa as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                    @endforeach
                </select>
                @error('siswa_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="mapel_id" class="block text-gray-700">Mata Pelajaran</label>
                <select name="mapel_id[]" class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white">
                    @foreach ($mapel as $m)
                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                    @endforeach
                </select>
                @error('mapel_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tahun_ajaran_id" class="block text-gray-700">Tahun Ajaran</label>
                <select name="tahun_ajaran_id[]" class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white">
                    @foreach ($tahun_ajaran as $t)
                        <option value="{{ $t->id }}">{{ $t->tahun }}</option>
                    @endforeach
                </select>
                @error('tahun_ajaran_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama Nilai</label>
                <input type="text" name="nama[]"
                    class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white" value="{{ old('nama') }}">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nilai" class="block text-gray-700">Nilai</label>
                <input type="number" name="nilai[]"
                    class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white" min="0" max="100"
                    value="{{ old('nilai') }}">
                @error('nilai')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700">Keterangan</label>
                <textarea name="keterangan[]" class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tingkat" class="block text-gray-700">Tingkat</label>
                <input type="number" name="tingkat[]"
                    class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white" value="{{ old('tingkat') }}">
                @error('tingkat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="semester" class="block text-gray-700">Semester</label>
                <input type="number" name="semester[]"
                    class="block w-full mt-1 p-2 border border-gray-300 rounded bg-white" value="{{ old('semester') }}">
                @error('semester')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </template>

    <script>
        document.getElementById('add-entry').addEventListener('click', function() {
            var template = document.getElementById('nilai-entry-template').content.cloneNode(true);
            document.getElementById('nilai-entries').appendChild(template);
        });
    </script>
@endsection
