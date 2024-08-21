<!-- 
   Logged-in user page
   Here the user performs the operations available on the site, a CRUD and a simple PDF generator.
-->

<!-- I get the layout from @ extends-->
@extends('admin.layout')

@section('title', 'Dashboard')
@section('content')

    <div class="container px-3 mx-auto my-28">
        <!-- I show success and error messages in the procedures below here -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
      
        <!-- Link to create vacation plans -->
        <div class="py-3">
            <h2 class="text-3xl font-bold mb-8">Dashboard</h2>
            <p class="mb-10">Vacation Plans, welcome!</p>
            <p></p>
            <a href="{{ route('admin.create.get') }}" class="inline-block py-3 px-6 md:text-lg bg-pink-200 hover:text-white hover:bg-pink-800  rounded mr-2">
               Create Plan   
            </a>
        </div>   
        
        <!-- If no data has been created, this field is displayed -->
        @if ($plans->isEmpty())
            <p class="inline-block py-3 px-6 md:text-lg bg-pink-200 hover:text-white hover:bg-pink-800  rounded mr-2">
                No vacation plans created!  
            </p>
        
        <!-- Otherwise, display existing vacation plans -->
        @else
        
            <!-- Runs showing all existing plans in the database -->
            @foreach ($plans as $plan)
                
                <!--  Form to delete a vacation plan by its ID -->
                <form action="{{ route('admin.delete', $plan->id) }}"  onsubmit="return confirm('Are you sure you want to delete this vacation plan?');" method="POST">
                    @csrf
                    @method('DELETE') 
                   
                    <div class="mb-3 bg-pink-200 px-3 py-3 my p-8 rounded">
                        <h4 class="font-bold text-2xl text-blue-800 ">Existing Vacation Plans</h4>
        
                        <!-- Title -->
                        <div class="grid gap-6 mb-6 md:grid-cols-2 mt-3">
                            <div class="relative">
                                <input type="text" disabled value="{{ $plan->title }}" name="#" id="floating_outlined" class="mt-2 cursor-not-allowed block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                                <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                Title
                                </label>
                            </div>
               
                            <!-- Date input -->
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-sm text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input datepicker-format="yyyy-mm-dd" value="{{ \Carbon\Carbon::parse($plan->date)->format('Y/m/d') }}" disabled datepicker name="date" id="default-datepicker" type="text" class="mt-2 cursor-not-allowed block ps-10 px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                                <label for="default-datepicker" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                    Date
                                </label>
                            </div>
                        </div>
            
                        <!-- Description -->
                        <div class="mb-6">
                            <div class="relative">
                                <textarea disabled name="description" cols="10" rows="3" id="floating_outlined" class="mt-8 cursor-not-allowed block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer"
                                >{{ $plan->description }}</textarea>
                                <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                    Description
                                </label>
                            </div>
                        </div>

                        <!-- Show locale -->
                        <div class="mb-6">
                            <div class="relative">
                                <input type="text" disabled value="{{ $plan->locale }}" name="locale" id="floating_outlined" class="mt-8 cursor-not-allowed block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                                <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                    Location
                                </label>
                            </div>
                        </div>
                       
                        <div class="space-y-2">
                            <!-- Update data link -->
                            <button class="text-black bg-blue-500 border border-blue-800 hover:border-pink-800 hover:border hover:text-white duration-300 hover:bg-pink-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                <a href="{{ route('admin.update.get', $plan->id) }}" >
                                    Update
                                </a>
                            </button>
                    
                            <!-- Delete button -->  
                            <button class="text-black bg-blue-500 border border-blue-800 hover:border-pink-800 hover:border hover:text-white duration-300 hover:bg-pink-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Delete</button>
                   
                            <!-- PDF Generator button -->
                            <button class="text-black bg-blue-500 border border-blue-800 hover:border-pink-800 hover:border hover:text-white duration-300 hover:bg-pink-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                <a href="{{ route('admin.vacation-plan.pdf', $plan->id) }}">
                                    PDF
                                </a>
                            </button>
                        </div>
                        
                    </div>
                </form>    
            @endforeach
        @endif                     
    </div>
@endsection
