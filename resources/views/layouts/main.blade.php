<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css') <!-- pastikan file Tailwind di-compile -->
    <script src="https://unpkg.com/@heroicons/react/outline"></script> <!-- Heroicons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-slate-800 text-white flex flex-col justify-between shadow-lg">
            <div>
                <div class="p-4 flex items-center">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.jBwefGdT24xikvtdnbmxkQHaHZ&pid=Api&P=0&h=180"
                        alt="Admin Logo" class="w-10 h-10 rounded-full mr-3">
                    <h1 class="text-lg font-bold">Admin Panel</h1>
                </div>
                <nav class="mt-6">
                    <a href="#"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 size-6  rounded-full mx-2">
                            <path
                                d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>

                        <p>Dashboard</p>
                    </a>
                    <a href="{{ route('admin.users') }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6  rounded-full mx-2">
                            <path fill-rule="evenodd"
                                d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                clip-rule="evenodd" />
                            <path
                                d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                        </svg>

                        <p>Users</p>
                    </a>
                    <a href="
                    {{ route('kelas.index') }}
                    "
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6  rounded-full mx-2">
                            <path fill-rule="evenodd"
                                d="M3 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5H15v-18a.75.75 0 0 0 0-1.5H3ZM6.75 19.5v-2.25a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h.75a.75.75 0 0 1 0 1.5h-.75A.75.75 0 0 1 6 6.75ZM6.75 9a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75ZM6 12.75a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 0 1.5h-.75a.75.75 0 0 1-.75-.75ZM10.5 6a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75Zm-.75 3.75A.75.75 0 0 1 10.5 9h.75a.75.75 0 0 1 0 1.5h-.75a.75.75 0 0 1-.75-.75ZM10.5 12a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75ZM16.5 6.75v15h5.25a.75.75 0 0 0 0-1.5H21v-12a.75.75 0 0 0 0-1.5h-4.5Zm1.5 4.5a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 2.25a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75v-.008a.75.75 0 0 0-.75-.75h-.008ZM18 17.25a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z"
                                clip-rule="evenodd" />
                        </svg>


                        <p>Class</p>
                    </a>

                </nav>
            </div>

            <!-- User Avatar and Logout -->
            <div class="p-4 border-t border-blue-800">
                <div class="relative">
                    <button id="avatarButton" class="w-full flex items-center focus:outline-none">
                        <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full mr-3">
                        <span class="font-semibold">Admin Name</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5 ml-auto transform transition-transform duration-200" id="chevronIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdownMenu"
                        class="absolute right-0 bottom-12 w-full bg-gray-800 text-white rounded-md shadow-lg hidden">
                        <a href="#"
                            class="block py-2 px-4 rounded transition duration-200 hover:bg-gray-700">Profile</a>
                        <a href="{{ route('logout') }}"
                            class="block py-2 px-4 rounded transition duration-200 hover:bg-gray-700">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-white">
            @yield('contentAdmin')
        </div>
    </div>

    <script>
        // Toggle dropdown menu for avatar
        document.getElementById('avatarButton').addEventListener('click', function() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const chevronIcon = document.getElementById('chevronIcon');

            dropdownMenu.classList.toggle('hidden');
            chevronIcon.classList.toggle('rotate-180'); // Rotate the chevron icon
        });
    </script>

</body>

</html>
