@extends('layouts.app')

@section('title', 'Input Nilai Siswa')

@section('contents')
    <div class="container p-5 mx-auto py-8">
        <h2 class="text-2xl font-semibold">Kelas: {{ $class->nama_kelas }} || Tingkat: {{ $tingkat }}</h2> 
        <h2 class="text-2xl font-semibold">Mapel: {{ $Mapel->nama }} || Semester: {{$semester}}</h2>
        @if (session('error'))
            @if (session('success'))
                <div class="bg-green-100 hidden text-green-700 p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif
        @elseif(session('success'))
            @if (session('success'))
                <div class="bg-green-100  text-green-700 p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
        @endif


        <h2 class="mt-5 text-2xl font-semibold">Input Nilai Siswa</h2>
        <p class="mb-6">Silahkan Unduh Template <a href="{{ route('nilai.export') }}"><u>Di Sini</u></a></p>
        <form
            action="{{ route('nilai.import', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel, 'semester' => $semester, 'nilai' => $nilai]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="relative inline-block">
                <input
                    class=" 
                file:bg-white file:text-gray-500 file:border-0
                file:shadow-xl  block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none "
                    id="file_input" name="file" type="file">
            </div>
            <button
                class="text-white bg-blue-700 my-2 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="submit">Import</button>
        </form>

        <form action="{{ route('nilai.import', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel, 'semester' => $semester, 'nilai' => $nilai]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 dark:border-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="file" class="hidden" />
                </label>
            </div> 
            <button
            class="text-white bg-blue-700 my-2 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="submit">Import</button>
        </form>






        {{-- <form action="{{ route('nilai.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-4xl mx-auto">
            @csrf --}}

        {{-- <div id="nilai-entries">
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
        </div> --}}
        </template>

        <script>
            document.getElementById('add-entry').addEventListener('click', function() {
                var template = document.getElementById('nilai-entry-template').content.cloneNode(true);
                document.getElementById('nilai-entries').appendChild(template);
            });
        </script>
    @endsection
