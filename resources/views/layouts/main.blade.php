<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css') <!-- pastikan file Tailwind di-compile -->
    <script src="https://unpkg.com/@heroicons/react/outline"></script> <!-- Heroicons -->
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-blue-500 flex flex-col justify-between shadow-lg">
            <div>
                <div class="p-4 flex items-center">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.jBwefGdT24xikvtdnbmxkQHaHZ&pid=Api&P=0&h=180"
                        alt="Admin Logo" class="w-10 h-10 rounded-full mr-3">
                    <h1 class="text-lg font-bold">Admin Panel</h1>
                </div>
                <nav class="mt-6">
                    <a href="#"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-6 h-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3v18h18M21 3l-18 18" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="#"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-6 h-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-6H2v6h5m0-6V5a5 5 0 015-5h2a5 5 0 015 5v9m-5-3a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Users
                    </a>
                    <a href="#"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-6 h-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Settings
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
                        <a href="#"
                            class="block py-2 px-4 rounded transition duration-200 hover:bg-gray-700">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-blue-100">
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
