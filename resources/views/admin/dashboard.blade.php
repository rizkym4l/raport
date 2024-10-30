@extends('layouts.main')

@section('contentAdmin')
    <div class="min-h-screen bg-slate-900 p-6">
        <div class="container mx-auto space-y-6">
            <!-- Welcome Card -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent mb-2">
                    Admin Dashboard
                </h1>
                <p class="text-slate-400">
                    Welcome to the Admin Dashboard. Here you can monitor important metrics and manage users.
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Teachers Card -->
                <div
                    class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-cyan-900/50 border border-cyan-700/50 text-cyan-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-400">Total Teachers</p>
                            <h2 class="text-2xl font-bold text-white group-hover:text-cyan-400 transition-colors">45</h2>
                        </div>
                    </div>
                </div>

                <!-- Students Card -->
                <div
                    class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-emerald-900/50 border border-emerald-700/50 text-emerald-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-400">Total Students</p>
                            <h2 class="text-2xl font-bold text-white group-hover:text-emerald-400 transition-colors">500
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Users Card -->
                <div
                    class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-amber-900/50 border border-amber-700/50 text-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-400">Total Users</p>
                            <h2 class="text-2xl font-bold text-white group-hover:text-amber-400 transition-colors">150</h2>
                        </div>
                    </div>
                </div>

                <!-- New Registrations Card -->
                <div
                    class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-purple-900/50 border border-purple-700/50 text-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-400">New Registrations</p>
                            <h2 class="text-2xl font-bold text-white group-hover:text-purple-400 transition-colors">30</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities & Announcements Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Activities -->
                <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
                    <h2 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-cyan-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Recent Activities
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center p-3 rounded-lg bg-slate-700/50 border border-slate-600">
                            <div
                                class="flex-shrink-0 h-10 w-10 rounded-full bg-cyan-900/50 border border-cyan-700/50 flex items-center justify-center text-cyan-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-white">Added new teacher: John Doe</p>
                                <p class="text-sm text-slate-400">2 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 rounded-lg bg-slate-700/50 border border-slate-600">
                            <div
                                class="flex-shrink-0 h-10 w-10 rounded-full bg-emerald-900/50 border border-emerald-700/50 flex items-center justify-center text-emerald-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-white">Student A got top scores in Math</p>
                                <p class="text-sm text-slate-400">1 hour ago</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Announcements -->
                <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
                    <h2 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-amber-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                        Announcements
                    </h2>
                    <div class="p-4 rounded-lg bg-amber-900/10 border border-amber-700/50">
                        <p class="text-amber-100">
                            Don't forget to update the student list for the new semester by the end of this month.
                        </p>
                        <div class="mt-3 flex items-center text-sm text-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Deadline: 30 days remaining
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .group:hover {
            animation: float 2s ease-in-out infinite;
        }
    </style>
@endsection
