<!-- 
    This page is used to change the user's password. 
    A page where the user adds an existing email address. 
    If the email address is valid, a link is sent to a page where the password can be changed.
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>New Password</title>
  
     <!-- CDN Tailwind/Flowbite -->
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>    
 
 </head>
 <body>
     
     <div class="font-mono flex-grow">
     
         <section class="bg-blue-100 px-4 min-h-screen flex box-border justify-center items-center">
     
             <div class="bg-pink-200 rounded-2xl flex max-w-3xl p-5 items-center">
                 <div class="md:w-1/2 px-8">
                     <h2 class="font-bold text-xl text-blue-800 mt-2">Enter your registered email address to reset your password</h2>
                     
                     <!-- Field status alert -->
                     @if (session('status'))
                         <span class="mt-4 text-sm text-black">{{ session('status') }}</span>
                     @endif
                     
                     <!-- Form route to logic -->
                     <form action="{{ route('password.emailLink') }}" method="POST" class="flex flex-col gap-4">
                         @csrf
                         <div class="relative">
                             <div class="relative">
                                 <input type="email" name="email" id="floating_outlined" class="mt-8 block px-2.5 pb-2.5 pt-4 w-full text-sm text-black bg-transparent rounded-lg border-1 border-black appearance-none focus:outline-none focus:ring-0 focus:border-black peer">
                                 <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-pink-200 px-2 peer-focus:px-2 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                     Email
                                 </label>
                                 @error('email')
                                     <span class="text-sm text-black">{{$message}}</span>
                                 @enderror
                             </div>
                         </div>
                         
                         <!-- button  -->
                         <button class="bg-blue-500 border-blue-800 border hover:border-pink-800 hover:border text-black hover:text-white py-2 rounded-xl duration-300 hover:bg-pink-500 font-medium" type="submit">Reset Password</button>
                         
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