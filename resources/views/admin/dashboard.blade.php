@extends('layouts.main')

@section('contentAdmin')
    <div class="container mx-auto p-6 space-y-6">
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <h1 class="text-2xl font-bold mb-2">Admin Dashboard</h1>
            <p class="text-gray-600">Welcome to the Admin Dashboard. Here you can monitor important metrics and manage users.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-8 h-8 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 11.5V7a3 3 0 116 0v4.5" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14.5a5 5 0 015-5 5 5 0 110 10 5 5 0 01-5-5zM7 14.5a5 5 0 110-10 5 5 0 010 10z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-xl font-semibold">Total Teachers</h2>
                        <p class="text-gray-600 text-sm">45 Teachers</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-8 h-8 text-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4h18v2H3V4zM6 10h12v10H6V10z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-xl font-semibold">Total Students</h2>
                        <p class="text-gray-600 text-sm">500 Students</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-8 h-8 text-yellow-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c2.5 0 4.5-2 4.5-4.5S14.5 2 12 2 7.5 4 7.5 6.5 9.5 11 12 11zM6 19c0-2.5 2-4.5 4.5-4.5s4.5 2 4.5 4.5" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-xl font-semibold">Total Users</h2>
                        <p class="text-gray-600 text-sm">150 Users</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="bg-red-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-8 h-8 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h1m0 0h1m-1-3a2 2 0 110 4h-1m1 0H9" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-xl font-semibold">New Registrations</h2>
                        <p class="text-gray-600 text-sm">30 This Month</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <h2 class="text-xl font-semibold mb-4">Recent Activities</h2>
            <ul class="list-disc list-inside text-gray-600">
                <li>Added new teacher: John Doe</li>
                <li>Student A got top scores in Math</li>
                <li>User admin updated settings</li>
                <li>New student registrations: 30</li>
            </ul>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <h2 class="text-xl font-semibold mb-4">Announcements</h2>
            <p class="text-gray-600">Don't forget to update the student list for the new semester by the end of this month.
            </p>
        </div>
    </div>
@endsection
