@extends('layouts.app')

@section('title', 'Pilih Tingkatan')

@section('contents')

    <div class="container mx-auto px-4 py-8 h-full">
        <h1 class="text-3xl font-semibold text-center mb-8">Pilih Tingkatan</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 ">
            <div class="1">
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 my-4">
                    <a href="/kelas"
                        class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-4">
                            <img src="{{ asset('assets/number-one.png') }}" alt="Icon" class="w-12 h-12">
                        </div>
                        <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 my-4">
                    <a href="/kelas"
                        class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-4">
                            <img src="{{ asset('assets/2.png') }}" alt="Icon" class="w-12 h-12">
                        </div>
                        <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 my-4">
                    <a href="/kelas"
                        class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-4">
                            <img src="{{ asset('assets/number-3.png') }}" alt="Icon" class="w-12 h-12">
                        </div>
                        <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
                    </a>
                </div>
            </div>
            <div class="2 p-4 rounded-lg hidden sm:block   ">
                <div class="p-20 bg-white h-2/3 overflow-hidden rounded-lg shadow-md absolute">
                    <p class=" text-lg font-bold text-gray-500">ahlan wa sahlan ustadz dan ustadzah silahkan pilih tingkat !
                    </p>
                    <img class=" " src="{{ asset('assets/sap.png') }}" alt="">

                </div>
            </div>
        </div>

    </div>
@endsection
