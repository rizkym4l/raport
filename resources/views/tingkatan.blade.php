@extends('layouts.app')

@section('title', 'Pilih Tingkatan')

@section('contents')

    <div class="container mx-auto px-4 py-8 h-full">
        <h1 class="text-3xl font-semibold text-center mb-8 bg-red-700">Pilih Tingkatan</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 my-4">
            <a href="/kelas" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Icon" class="w-12 h-12">
                </div>
                <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 my-4">
            <a href="/kelas" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Icon" class="w-12 h-12">
                </div>
                <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 my-4">
            <a href="/kelas" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Icon" class="w-12 h-12">
                </div>
                <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
            </a>
        </div>
    </div>
@endsection
