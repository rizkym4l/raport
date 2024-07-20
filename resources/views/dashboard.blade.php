@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')

    <div class="container mx-auto p-6">
        @if (session('success'))
            <div class="alert alert-success bg-green-200 my-8">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Selamat Datang di Dashboard E Raport</h1>
            <p class="text-gray-600 mt-2">Kami bangga menyambut Anda di platform kami, tempat kreativitas dan teknologi
                bertemu.</p>
        </div>

        <div class="relative hero bg-cover bg-center rounded-lg shadow-lg overflow-hidden"
            style="background-image: url('https://o-cdn-cas.sirclocdn.com/parenting/images/Lingkungan_Sekolah_Al_Kahfi.width-800.format-webp.webp'); height: 300px;">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h2 class="text-3xl text-white text-center font-semibold">Dashboard Overview</h2>
            </div>
        </div>

        <div class="mt-10 bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
            <table class="table-auto w-full text-left bg-white text-gray-800">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 whitespace-nowrap">Tingkat</th>
                        <th class="py-3 px-6 whitespace-nowrap">Semester 1</th>
                        <th class="py-3 px-6 whitespace-nowrap">Semester 2</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 whitespace-nowrap">1</td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/1/1"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/1/2"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 whitespace-nowrap">2</td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/2/1"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/2/2"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 whitespace-nowrap">3</td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/3/1"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/3/2"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
