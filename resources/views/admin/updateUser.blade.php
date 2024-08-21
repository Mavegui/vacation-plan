<!-- 
   Page for the user to change their profile if they've made a mistake.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>

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

    <form class="bg-pink-200 px-3 py-3 rounded" action="{{ route('admin.updateUser.put') }}" method="POST">
        @csrf
        @method('PUT')

        <h4 class="font-bold text-2xl text-blue-800 ">Edit Profile</h4>
        
        <!-- FirstName -->
        <div class="grid gap-6 mb-6 md:grid-cols-2 mt-3">
            <div class="relative">
                <input type="text" value="{{ old('firstName', $user->firstName) }}" name="firstName" id="floating_outlined" class="mt-2 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                   First Name
                </label>
            </div>
           
            <!-- LastName -->
            <div class="relative">
                <input type="text" value="{{ old('lastName', $user->lastName) }}" name="lastName" id="floating_outlined" class="mt-2 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                    Last Name
                </label>
            </div>
        </div>
        
        <!-- Email -->
        <div class="mb-6">
            <div class="relative">
                <input type="email" value="{{ old('email', $user->email) }}" name="email" id="floating_outlined" class="mt-8 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                    Email
                </label>
            </div>
        </div>

        <button type="submit" class="text-black bg-blue-500 border border-blue-800 hover:border-pink-800 hover:border hover:text-white duration-300 hover:bg-pink-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save Changes</button>
    </form>                        
</div>

<!-- Flowbite script -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</body>
</html>
