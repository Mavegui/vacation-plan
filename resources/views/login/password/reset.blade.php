<!-- 
    This page is used to change the user's password. 
    The user accesses it via the password reset link sent to the email address they have registered with the system.
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Reset Password</title>
  
     <!-- CDN Flowbite and TailwindCSS -->
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>    
 
 </head>
 <body>
     <div class="font-mono flex-grow">          
 
         <section class="bg-blue-100 px-4 min-h-screen flex box-border justify-center items-center">
     
             <div class="bg-pink-200 rounded-2xl flex max-w-3xl p-5 items-center">
                 <div class="md:w-1/2 px-8">
                     <h2 class="font-bold text-3xl text-blue-800 mt-2">Create a New Password</h2>
                     
                     <!-- Field error alert -->
                     @error('error')
                         <span class="text-sm text-black mt-2">{{$message}}</span>
                     @enderror
                     
                     <!-- Form route to logic -->
                     <form action="{{ route('password.resetPost') }}" method="POST" class="flex flex-col gap-4">
                         @csrf
 
                         <!-- Secret token -->
                         <input type="hidden" name="token" value="{{ $token }}">             
                         
                         <div class="relative">
                             <!-- Input email -->
                             <div class="relative">
                                 <input type="email" name="email" id="floating_outlined" class="mt-8 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                                 <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                     Email
                                 </label>
                                 <!-- Email alert -->
                                 @error('email')
                                     <span class="text-sm text-black">{{$message}}</span>
                                 @enderror
                             </div>
 
                             <!-- Input password -->
                             <div class="relative">
                                 <input type="password" name="password" id="floating_outlined" class="mt-2 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                                 <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                     Password
                                 </label>
                             </div>
                             
                             <!-- Input password confirmation -->
                             <div class="relative">
                                 <input type="password" name="password_confirmation" id="floating_outlined" class="mt-2 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                                 <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                     Confirm Password
                                 </label>
                                 <!-- Alert password -->
                                 @error('password')
                                     <span class="text-sm text-black">{{$message}}</span>
                                 @enderror
                             </div>
                         </div>
                         <!-- Save changes -->   
                         <button class="bg-blue-500 border border-blue-800 hover:border-pink-800 hover:border text-black hover:text-white py-2 rounded-xl duration-300 hover:bg-pink-500 font-medium" type="submit">
                             Save Password
                         </button>
                         
                     </form>
                 </div>
                 <div class="md:block hidden w-1/2">
                     <img class="rounded-2xl max-h-[1600px]" 
                     src="{{ asset('img/paisagem.jpg') }}" alt="reset password form image">
                 </div>
             </div>
         </section>
     
     </div>
 
     <!-- Flowbite script -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
 
 </body>
 </html>
 