<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100 h-max font-[Poppins]">
    <div class="drawer drawer-mobile">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.jBwefGdT24xikvtdnbmxkQHaHZ&pid=Api&P=0&h=180"
                        alt="Logo" class="w-10 h-10 mx-2">
                    <span class="ml-2 text-lg font-semibold text-gray-700">Eraport</span>
                </div>
                <div class="flex items-center space-x-4 ">
                    <span class="text-gray-600 hidden sm:block">Jumat, 05 Juli 2024</span>
                    <div class="relative">
                        <button class="flex items-center focus:outline-none">
                            <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-full h-10 w-10">
                        </button>
                    </div>
                </div>
            </nav>

            <div class="p-6">
                @yield('contents')
            </div>
        </div>

        <div class="drawer-side">
            <label for="my-drawer" class="drawer-overlay"></label>
            <ul class="menu bg-gray-800 text-white w-80 p-4 space-y-2">
                <li><a href="#" class="hover:bg-gray-700 p-2 rounded-md">Dashboard</a></li>
                <li><a href="#" class="hover:bg-gray-700 p-2 rounded-md">Profile</a></li>
                <li><a href="#" class="hover:bg-gray-700 p-2 rounded-md">Settings</a></li>
                <li><a href="#" class="hover:bg-gray-700 p-2 rounded-md">Help</a></li>
            </ul>
        </div>
    </div>
</body>

</html>
