@extends('layouts.main')

@section('contentAdmin')
    <div class="container mx-auto p-6 space-y-6">

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z" />
                    </svg>
                </span>
            </div>
        @endif

        <!-- Menampilkan pesan error -->
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934-2.934a1 1 0 000-1.414z" />
                    </svg>
                </span>
            </div>
        @endif

        <!-- Header dengan Logo Users -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-8 h-8 text-blue-500 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 19.121A4.999 4.999 0 0112 17.5a4.999 4.999 0 016.879 1.621M12 14a5 5 0 110-10 5 5 0 010 10z" />
            </svg>
            <h1 class="text-2xl font-bold">User Management Dashboard</h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 mb-6 flex gap-5">
            <form action="{{ route('admin.users') }}" method="GET" class="w-4/5">
                <div class="flex items-center">
                    <input type="text" name="search" value="{{ request()->input('search') }}"
                        class="border border-gray-300 rounded-lg px-4 py-2 mr-2 w-full bg-white"
                        placeholder="Search by name or email">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 hover:shadow-lg transition-all duration-300">
                        Search
                    </button>
                </div>
            </form>
            <button
                class="w-1/5 bg-blue-500 rounded-md text-white px-4 py-2 shadow hover:bg-blue-600 transition-all duration-300">
                <a href="{{ route('users.create') }}">
                    Add User
                </a>
            </button>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <h2 class="text-lg font-semibold mb-4">Users List</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6">Name</th>
                            <th class="py-3 px-6">Email</th>
                            <th class="py-3 px-6">Role</th>
                            <th class="py-3 px-6">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($users as $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-6 h-6 text-blue-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5.121 19.121A4.999 4.999 0 0112 17.5a4.999 4.999 0 016.879 1.621M12 14a5 5 0 110-10 5 5 0 010 10z" />
                                            </svg>
                                        </div>
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6">{{ $user->email }}</td>
                                <td class="py-3 px-6">{{ $user->role }}</td>
                                <td class="py-3 px-6">
                                    <div class="flex item-center justify-start">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="w-4 mr-2 transform text-green-500 hover:text-green-600 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 20h9m-9-4h9m-9-4h9M5 12h.01M7 16h.01" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-4 mr-2 transform text-red-500 hover:text-red-600 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-3">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->appends(['search' => request()->input('search')])->links() }}
                </div>
            </div>
        </div>

        <div id="addUserModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <h2 class="text-xl font-semibold mb-4">Add New User</h2>
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name"
                                class="border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                class="border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select name="role" id="role"
                                class="border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="button"
                                onclick="document.getElementById('addUserModal').classList.add('hidden')"
                                class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Cancel</button>
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
