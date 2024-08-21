<!-- 
    Login page
    It contains the input fields for email and password, plus 1 forgot password link and 1 create account button.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- CDN Tailwind/Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body>

<div class="font-mono flex-grow">
    
    <section class="bg-blue-100 px-4 min-h-screen flex box-border justify-center items-center">

        <div class="bg-pink-200 rounded-2xl flex max-w-3xl p-5 items-center">
            <div class="md:w-1/2 px-8">
                <h2 class="font-bold text-3xl text-blue-800 mt-2">Log In</h2>
                
                <!-- Field to display validation alerts -->
                @if (session('status'))
                    <span class="mt-4 text-sm text-black">{{ session('status') }}</span>
                @endif
 
                @error('error')
                    <span class="text-sm text-black mt-2">{{$message}}</span>
                @enderror
                
                <!-- Form login -->
                <form action="{{route('login.store')}}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    
                    <!-- Input email -->
                    <div class="relative">
                        <div class="relative">
                            <input type="email" name="email" id="floating_outlined" class="mt-8 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                            <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                Email
                            </label>
                            
                            <!-- Field to display validation alert email -->
                            @error('email')
                                <span class="text-sm text-black">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <!-- Input password -->
                        <div class="relative">
                            <input type="password" name="password" id="floating_outlined" class="mt-8 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                            <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                Password
                            </label>
                            
                            <!-- Field to display validation alert password -->
                            @error('password')
                                <span class="text-sm text-black">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Login button -->
                    <button class="bg-blue-500 border-blue-800 border hover:border-pink-800 hover:border text-black hover:text-white py-2 rounded-xl duration-300 hover:bg-pink-500 font-medium" type="submit">Log In</button>
                    
                </form>
                
                <!-- Link reset password -->
                <div class="mt-10 text-sm border-b border-gray-500 py-5 playfair tooltip">
                    <a href="{{ route('password.emailForm') }}">Forgot your password?</a>
                </div>
                
                <!-- Button to create account -->
                <div class="mt-4 text-sm flex justify-between items-center container-mr">
                    <p class="mr-3 md:mr-0">Don't have an account?</p>
                    <button class="border border-blue-800 hover:border register text-black bg-blue-500 hover:border-pink-800 rounded-xl py-2 px-5 hover:text-white hover:bg-pink-500 font-semibold duration-300">
                        <a href="{{route('user.create')}}">Create Account</a>
                    </button>
                </div>
            </div>
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl max-h-[1600px]" 
                src="{{ asset('img/paisagem.jpg') }}" alt="login form image">
            </div>
        </div>
        
    </section>

</div>

<!-- Flowbite script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</html>
