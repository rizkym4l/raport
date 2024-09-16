@extends('layouts.main')

@section('contentAdmin')
    <div class="container mx-auto p-6 space-y-6">

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Add New User</h2>

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-white border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full"
                        placeholder="Enter user's name">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-white border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full"
                        placeholder="Enter user's email">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="bg-white border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full"
                        placeholder="Create a password">
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role"
                        class="bg-white border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full">
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                        <option value="guru">Guru</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-16 h-16 bg-gray-100 border border-gray-300 rounded-lg flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v4c0 3.52 2.5 6.43 6 6.92v3.58a.5.5 0 001 .17V6.83a.5.5 0 00-1 .17v9.92c-1.68-.53-3-2.14-3-4.08V7c0-.28-.22-.5-.5-.5h-1a.5.5 0 00-.5.5zM8 5a2 2 0 012 2v10a2 2 0 11-4 0V7a2 2 0 012-2z" />
                            </svg>
                        </div>
                        <input type="file" name="photo" id="photo" accept="image/*"
                            class="bg-white border border-gray-300 rounded-lg px-4 py-2 w-full">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
