@extends('layouts.app')

@section('title', 'Pilih Kelas')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-600">Pilih Nilai</h1>


        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($data as $i)
                <a href="/nilai/create/{{ $tingkat }}/{{ $kelas }}/{{ $mapel }}/{{ $semester }}/{{ $i->id }}"
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    <div class="flex items-center justify-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="Icon"
                            class="w-16 h-16 rounded-full border-2 border-blue-600">
                    </div>
                    <h2 class="text-2xl font-semibold text-center text-gray-800">{{ $i->name }}</h2>
                </a>
            @endforeach

        </div>
    </div>
@endsection
