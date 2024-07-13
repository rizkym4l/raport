@extends('layouts.app')

@section('title', 'Data Nilai')

@section('contents')
    <div class="sm:container sm:mx-auto sm:px-4 py-8 h-full">
        <h1 class="text-3xl font-semibold text-center mb-8">Data Nilai</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Mapel</th>
                        <th class="py-2 px-4 border-b">UH 1</th>
                        <th class="py-2 px-4 border-b">UH 2</th>
                        <th class="py-2 px-4 border-b">Nilai Harian</th>
                        <th class="py-2 px-4 border-b">UTS</th>
                        <th class="py-2 px-4 border-b">UAS</th>

                        <th class="py-2 px-4 border-b">Nilai Rata Rata</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">Agama</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
