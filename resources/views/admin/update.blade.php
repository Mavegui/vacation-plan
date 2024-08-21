<!--
    On this page, the user changes the existing data in the vacation plan.
    Something that has been adopted in style is that in the dashboard the input fields are disabled using Tailwind,
    while this page does not use that.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>

    <!-- CDN Tailwind/Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-200">
    
<div class="container px-3 mx-auto my-28">
    
    <!-- Alert fields that signal existing validation -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Forms using PUT to update existing values -->
    <form class="bg-pink-200 px-3 py-3 rounded" action="{{ route('admin.update.put', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h4 class="font-bold text-2xl text-blue-800 ">Existing Vacation Plans</h4>
        
        <!-- Title -->
        <div class="grid gap-6 mb-6 md:grid-cols-2 mt-3">
            <div class="relative">
                <input type="text" value="{{ $plan->title }}" name="title" id="floating_outlined" class="mt-2 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
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
                <input datepicker-format="yyyy-mm-dd" value="{{ \Carbon\Carbon::parse($plan->date)->format('Y-m-d') }}" datepicker name="date" id="default-datepicker" type="text" class="mt-2 block ps-10 px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                <label for="default-datepicker" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                    Date
                </label>
            </div>
        </div>
        
        <!-- Description -->
        <div class="mb-6">
            <div class="relative">
                <textarea name="description" cols="10" rows="3" id="floating_outlined" class="mt-8 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">{{ $plan->description }}</textarea>
                <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                    Description
                </label>
            </div>
        </div>

        <!-- Locale -->
        <div class="mb-6">
            <div class="relative">
                <input type="text" value="{{ $plan->locale }}" name="locale" id="floating_outlined" class="mt-8 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                    Location
                </label>
            </div>
        </div>
        
        <!-- Save changes -->
        <button type="submit" class="text-black bg-blue-500 border border-blue-800 hover:border-pink-800 hover:border hover:text-white duration-300 hover:bg-pink-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save Changes</button>
    </form>                        
</div>

<!-- Flowbite script -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</body>
</html>
