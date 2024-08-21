<!-- Calls site layout and name -->
@extends('site.layout')

@section('title', 'Férias GO')
    
@section('content')
    
    <!-- Website content -->
    <div class="md:flex justify-between p-10 bg-blue-100 text-blue-800">

        <!-- Right side -->
        <div class="md:w-1/2 mb-5 md:mb-0">
            <h2 class="text-4xl font-bold mb-8">Come plan with us how to relax!</h2>
            <p class="mb-10">Create, manage, and download your vacation plans. Don’t stress over creating a vacation plan for your family; streamline the process using our website.</p>

            <!-- Drawer initialization and toggle -->
            <div class="text-center">
                <button class="py-3 px-6 md:text-lg bg-pink-200 hover:text-white hover:bg-pink-800 rounded mr-2" type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
                Learn more...
                </button>
            </div>
 
            <!-- Drawer component -->
            <div id="drawer-example" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-blue-500 text-black hover:text-white md:hover:text-white" tabindex="-1" aria-labelledby="drawer-label">
                <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold">
                    <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    Project Info
                </h5>
                
                <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-black bg-transparent hover:bg-gray-200 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center hover:bg-pink-200">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">
                        Close menu
                    </span>
                </button>
       
                <p class="mb-6 text-sm text-white">This website is a project for a position at 
                    <a href="https://buzzvel.com/" class="text-red-700 hover:underline">
                    Buzzvel
                    </a><br> 
                    The goal is to demonstrate the developer’s knowledge and skills, I, Gui S2 <br>
                    Creating a login system, CRUD for vacation planning, and generating PDFs about it.
                </p>
            </div>
        </div>
    
        <!-- Left side -->
        <div class="md:w-1/2">
            <img src="{{ asset('img/bird.jpg') }}" alt="Travel" class="w-full md:w-full rounded shadow-2xl h-auto max-h-full sm:max-h-screen md:max-h-full lg:max-h-screen xl:max-h-full">
        </div>
    </div>

@endsection
