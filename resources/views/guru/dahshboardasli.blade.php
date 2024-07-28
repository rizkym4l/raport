@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('contents')

    <div class="container mx-auto p-6">
        @if (session('success'))
            <div class="alert alert-success bg-green-200 my-8">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Selamat Datang di Dashboard Guru</h1>
            <p class="text-gray-600 mt-2">Platform untuk mengelola nilai siswa dengan mudah dan efisien.</p>
        </div>

        <div class="relative hero bg-cover bg-center rounded-lg shadow-lg overflow-hidden"
            style="background-image: url('https://o-cdn-cas.sirclocdn.com/parenting/images/Lingkungan_Sekolah_Al_Kahfi.width-800.format-webp.webp'); height: 300px;">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h2 class="text-3xl text-white text-center font-semibold">Dashboard Overview</h2>
            </div>
        </div>
        {{-- {{ route('guru.perbaikan-nilai') }}  --}}
        <div class="mt-10 bg-green-600 ">
            <div class="row grid grid-cols-1 md:grid-cols-2  bg-red-600">
                <div class="grid col-auto">

                    <a href="
                     {{ route('tingkatan') }}"
                        class="block bg-blue-500 text-white p-6 rounded-lg shadow-lg text-center hover:bg-blue-600">
                        <h3 class="text-2xl font-bold mb-2">Input Nilai</h3>
                        <p>Masukkan nilai siswa dengan mudah.</p>
                    </a>
                </div>
                <div class=" grid col-auto">
                    <a href=""
                        class="block bg-blue-500 text-white p-6 rounded-lg shadow-lg text-center hover:bg-blue-600">
                        <h3 class="text-2xl font-bold mb-2">Perbaikan Nilai</h3>
                        <p>Lakukan perbaikan nilai siswa.</p>
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
