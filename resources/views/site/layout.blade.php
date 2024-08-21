<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- CDN Tailwind/Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div>
    <!-- MENU -->
    <nav class="bg-blue-500">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                
            <!-- Logo and name-->
            <a href="{{ route('site.home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('img/guarda-sol.png') }}" class="h-8" alt="logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Vacation GO</span>
            </a>

            <!-- MOBILE MENU -->
            <button id="hamburger" data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden hover:bg-pink-200 focus:outline-none text-black" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>    
                <img id="close-icon" class="toggle hidden w-18 h-12" src="{{ asset('img/x.svg') }}" alt="Close Menu" />
            </button>
                
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded md:space-x-8 md:bg-transparent md:flex-row md:mt-0 md:border-0 bg-pink-200 border-black">
                    <li>
                        <!-- Login here -->
                        <a href="{{ route('login.index') }}" class="inline-block p-2 px-4 text-black md:hover:text-white hover:text-pink-700 mr-2">Log In</a>
                    </li>  
                    <li>
                        <!-- Register here -->
                        <a href="{{ route('user.create') }}"
                            class="inline-block py-2 px-4 text-black bg-pink-200 md:hover:bg-pink-800 hover:text-pink-700 md:hover:text-white rounded transition ease-in duration-150">
                            Sign Up
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
    
    <!-- Website Content -->
    <div class="bg-blue-100 text-blue-800 flex flex-col min-h-screen">
        <div class="flex-grow font-mono">  
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="p-4 bg-blue-500 sm:p-6">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="flex items-center">
                        <img src="{{ asset('img/guarda-sol.png') }}" class="mr-3 h-8" alt="Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-black hover:text-white">Mavegui</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase text-black hover:text-white">Resources</h2>
                        <ul class="text-black hover:text-white font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Learn More</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">NoIdea</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase text-black hover:text-white">#Gui</h2>
                        <ul class="text-black hover:text-white font-medium">
                            <li class="mb-4">
                                <a href="https://www.linkedin.com/in/gui77feitosa/" class="hover:underline">Contact</a>
                            </li>
                            <li>
                                <a href="https://www.porfoliogui.com.br/" class="hover:underline">Portfolio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-black sm:mx-auto dark:border-black lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-black sm:text-center dark:text-black hover:text-white">© 2024 <a href="#" class="hover:underline">Mavegui™</a>. All rights reserved.</span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="https://www.facebook.com/Sr.Guillermo77/" class="text-black hover:text-white dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="https://github.com/mavegui" class="text-black hover:text-white dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<script>
    // Menu toggle logic for mobile view
    document.getElementById('hamburger').addEventListener('click', function() {
        const menu = document.getElementById('navbar-dropdown');
        const closeIcon = document.getElementById('close-icon');
        menu.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>
</body>
</html>
