@extends('layouts.main')

@section('contentAdmin')
    <div class="container mx-auto p-6 space-y-6">

        <h2 class="text-2xl font-bold">Daftar Kelas</h2> <!-- Heading utama untuk halaman -->

        <div class="flex justify-between">
            <form action="{{ route('kelas.index') }}" method="GET" class="flex w-4/5 bg-white">
                <input type="text" name="search" id="search"
                    class="border border-gray-300 bg-white rounded-lg px-4 py-2 w-full" placeholder="Search Kelas..."
                    value="{{ request()->input('search') }}">
            </form>

            <a href="{{ route('kelas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Add Kelas
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-4">List of Classes</h3> <!-- Heading tabel -->

            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 text-sm">
                        <th class="py-3 px-6">Nama Kelas</th>
                        <th class="py-3 px-6">Tingkat</th>
                        <th class="py-3 px-6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $kls)
                        <tr class="border-b">
                            <td class="py-3 px-6">{{ $kls->nama_kelas }}</td>
                            <td class="py-3 px-6">{{ $kls->tingkat }}</td>
                            <td class="py-3 px-6 flex gap-2">
                                <a href="{{ route('kelas.edit', $kls->id) }}" class="text-green-600">Edit</a>
                                <form action="{{ route('kelas.destroy', $kls->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-3">No Kelas found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $kelas->links() }}
            </div>
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            const query = this.value;
            fetch(`/kelas/search?search=${query}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.querySelector('tbody');
                    tableBody.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(kelas => {
                            const row = `
                            <tr class="border-b">
                                <td class="py-3 px-6">${kelas.nama_kelas}</td>
                                <td class="py-3 px-6">${kelas.tingkat}</td>
                                <td class="py-3 px-6 flex gap-2">
                                    <a href="/kelas/${kelas.id}/edit" class="text-green-600">Edit</a>
                                    <form action="/kelas/${kelas.id}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        `;
                            tableBody.innerHTML += row;
                        });
                    } else {
                        tableBody.innerHTML =
                            '<tr><td colspan="3" class="text-center py-3">No Kelas found.</td></tr>';
                    }
                });
        });
    </script>
@endsection
