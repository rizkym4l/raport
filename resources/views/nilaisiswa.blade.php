@extends('layouts.app')

@section('title', 'Data Nilai')

@section('contents')
    <div class="sm:container sm:mx-auto sm:px-4 py-8 h-full">
        <div class="flex items-center mb-8">
            <button onclick="window.history.back()"
                class="btn bg-slate-200 mx-2 sm:mx-0 border-slate-300 border-2 hover:bg-slate-50 hover:border-slate-100 mr-auto">Kembali</button>
            <h1 class="text-3xl font-semibold mx-2 sm:mx-10 w-full">Data Nilai</h1>
        </div>
        <div class="overflow-x-auto">
            @if (count($data) === 0)
                <div class="flex justify-center items-center h-64">
                    <div class="text-center">
                        <svg class="emoji-404 w-24 h-24 mx-auto mb-4 animate-bounce" enable-background="new 0 0 226 249.135"
                            height="249.135" id="Layer_1" overflow="visible" version="1.1" viewBox="0 0 226 249.135"
                            width="226" xml:space="preserve">
                            <circle cx="113" cy="113" fill="#FFE585" r="109" />
                            <line enable-background="new    " fill="none" opacity="0.29" stroke="#6E6E96"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="88.866"
                                x2="136.866" y1="245.135" y2="245.135" />
                            <line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="154.732"
                                x2="168.732" y1="245.135" y2="245.135" />
                            <line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="69.732"
                                x2="58.732" y1="245.135" y2="245.135" />
                            <circle cx="68.732" cy="93" fill="#6E6E96" r="9" />
                            <path
                                d="M115.568,5.947c-1.026,0-2.049,0.017-3.069,0.045  c54.425,1.551,98.069,46.155,98.069,100.955c0,55.781-45.219,101-101,101c-55.781,0-101-45.219-101-101  c0-8.786,1.124-17.309,3.232-25.436c-3.393,10.536-5.232,21.771-5.232,33.436c0,60.199,48.801,109,109,109s109-48.801,109-109  S175.768,5.947,115.568,5.947z"
                                enable-background="new    " fill="#FF9900" opacity="0.24" />
                            <circle cx="156.398" cy="93" fill="#6E6E96" r="9" />
                            <ellipse cx="67.732" cy="140.894" enable-background="new    " fill="#FF0000" opacity="0.18"
                                rx="17.372" ry="8.106" />
                            <ellipse cx="154.88" cy="140.894" enable-background="new    " fill="#FF0000" opacity="0.18"
                                rx="17.371" ry="8.106" />
                            <path
                                d="M13,118.5C13,61.338,59.338,15,116.5,15c55.922,0,101.477,44.353,103.427,99.797  c0.044-1.261,0.073-2.525,0.073-3.797C220,50.802,171.199,2,111,2S2,50.802,2,111c0,50.111,33.818,92.318,79.876,105.06  C41.743,201.814,13,163.518,13,118.5z"
                                fill="#FFEFB5" />
                            <circle cx="113" cy="113" fill="none" r="109" stroke="#6E6E96"
                                stroke-width="8" />
                        </svg>

                        <div class="animate-bounce text-gray-500 text-xl">Data Belum Tersedia</div>
                    </div>
                </div>
            @else
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-200">Mapel</th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-200">Sumatif 1</th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-200">Sumatif 2</th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-200">Sumatif 3</th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-200">Formatif 1</th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-200">Formatif 2</th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-200">Formatif 3</th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-200">Sumatif Tengah Semester</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $mapelData)
                            <tr class="hover:bg-gray-100 text-center">
                                <td class="py-2 px-4 border-b border-gray-200">{{ $mapelData['mapel_id'] ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $mapelData['sumatif1'] ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $mapelData['sumatif2'] ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $mapelData['sumatif3'] ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $mapelData['formatif1'] ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $mapelData['formatif2'] ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $mapelData['formatif3'] ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    {{ $mapelData['sumatiftengahsemester'] ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
