@extends('layouts.app')

@section('title', 'Pilih Kelas')

@section('contents')
    <div class="container mx-auto px-4 py-8 ">
        <h1 class="text-3xl font-semibold text-center mb-8">Pilih Kelas</h1>
        {{-- {{ $kelas }} --}}
        <div class="grid grid-cols-3 gap-5">
            @foreach ($kelas as $item)
                <div class="grid grid-cols-1 my-4 gap-6">
                    <a href="/nilai/create/{{ $item->id }}"
                        class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        <div class="flex items-center justify-center mb-4">
                            <img src="https://via.placeholder.com/50" alt="Icon" class="w-12 h-12">
                        </div>
                        <h2 class="text-xl font-semibold text-center">{{ $item->nama_kelas }}</h2>
                    </a>
                </div>
            @endforeach

        </div>

    </div>
@endsection
