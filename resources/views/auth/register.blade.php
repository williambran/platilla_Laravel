<!DOCTYPE html>
<html lang="en" >
    <head>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <style >
        .body-bg {
          background-color: #9921e8;
          background-image: linear-gradient(315deg,#9921e8 0%, #5f72be 74%);
        }
      </style>
    </head>


    <body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;" >

      <header class="max-w-lg mx-auto">
        <h1 class="text-4xl font-bold text-center text-white">Stara</h1>

      </header>

      <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-xl shadow-2xl">
        <section>
          <h3 class="font-bold text-2xl">Welcome to startup</h3>
          <p class="text-gray-600 pt-2">sign into</p>
        </section>

        <section class="mt-10">
          <form class="flex flex-col " action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-6 pt-1 rounded bg-gray-200">
              <label class="block text-gray-700  text-sm font-bold  ml-3" for="email">Email*</label>
              <input value="{{old('email')}}" type="text" id="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none  border-b-4 border-gray-300 focus:border-purple-600 transition duration-1000 px-3 ">
              @error('email')
              <p class="bg-red-200 text-red-700">{{$message}}</p>
              @enderror

            </div>
            <div class="mb-6 pt-1 rounded bg-gray-200">
              <label class="block text-gray-700  text-sm font-bold  ml-3" for="name">Nombre*</label>
              <input type="text" id="name" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none  border-b-4 border-gray-300 focus:border-purple-600 transition duration-1000 px-3 ">
              @error('name')
              <p class="bg-red-200 text-red-700">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-6 pt-1 rounded bg-gray-200">
              <label class="block text-gray-700  text-sm font-bold  ml-3" for="fatherLastName">Apellido paterno</label>
              <input type="text" id="fatherLastName" name="fatherLastName" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none  border-b-4 border-gray-300 focus:border-purple-600 transition duration-1000 px-3 ">
              @error('fatherLastName')
              <p class="bg-red-200 text-red-700">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-6 pt-1 rounded bg-gray-200">
              <label class="block text-gray-700  text-sm font-bold  ml-3" for="motherLastName">Apellido materno</label>
              <input type="text" id="motherLastName" name="motherLastName" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none  border-b-4 border-gray-300 focus:border-purple-600 transition duration-1000 px-3 ">
              @error('fatherLastName')
              <p class="bg-red-200 text-red-700">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-6 pt-1 rounded bg-gray-200">
              <label class="block text-gray-700  text-sm font-bold  ml-3" for="password">Password*</label>
              <input type="password" id="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-1000 px-3">
              @error('password')
              <p class="bg-red-200 text-red-700">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-6 pt-1 rounded bg-gray-200">
              <label class="block text-gray-700  text-sm font-bold  ml-3" for="password"> Confirmar Password*</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-1000 px-3">
              @error('password_confirmation')
              <p class="bg-red-200 text-red-700">{{$message}}</p>
              @enderror
            </div>
            <div class="flex justify-end">
              <a href="#" class="text-sm text-purple-600 hover:text-purple-700 hover:underline"> Olvidaste tu contraseña?</a>
            </div>

            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded-3xl shadow-2xl hover:shadow-xl" type="submit" name="button">Iniciar Sesion</button>


          </form>
        </section>
      </main>

      <div class="max-w-lg mx-auto text-center mt-12 mb-6">
        <p class="text-white"> ¿No tienes cuenta?
          <a href="#" class="font-bold hover:underline">Sign up</a>
         </p>
      </div>

      <footer class="max-w-lg mx-auto flex justify-center text-white">
        <a href="#" class=""> Contacto </a>
        <span class="mx-3"> º </span>
        <a href="#" class=""> Privacidad</a>
      </footer>

    </body>
</html>

 <!--


<nav class=" bg-indigo-700 shadow-lg md:flex md:items-center md:justify-between">
   <div class="flex justify-between items-center ">
     <a href="#" class="m-3 text-3xl font-[Popp] cursor-pointer text-white">
       <img src="storage/sources/logo.png" alt="" class="h-10 inline"> Logo
     </a>

     <span class="text-3xl cursor-pointer md:hidden mx-2 ">
       <ion-icon  name="menu" class="text-white" onclick="Menu(this)"></ion-icon>
     </span>
   </div>


       <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-indigo-700 w-full left-0 md:w-auto md:py-0 md:pl-0 pl-7 md:opacity-100 opacity-100 top-[60px] transition-all ease-in duration-500">
         <li class="mx-4 my-6 md:my-0 ">
           <a href="#" class="p-3 hover:text-white">item 1</a>
         </li>
         <li class="sm:inline-block">
           <a href="#" class="p-3 hover:text-white">item 2</a>
         </li>
         <li class="sm:inline-block">
           <a href="#" class="p-3 hover:text-white">item 3</a>
         </li>
         <li class="sm:inline-block">
           <a href="#" class="p-3 hover:text-white">item 4</a>
         </li>
         <li class="sm:inline-block">
           <a href="#" class="p-3 hover:text-white">item 5</a>
         </li>
       </ul>


 </nav>


 Este es otro

 <div class="block lg:hidden">
   <button class="flex flex-col" type="button" name="button" onclick="toggle_nav()">
     <div class="w-6 h-1 bg-white">

     </div>
     <div class="w-6 h-1 bg-white my-1">

     </div>
     <div class="w-6 h-1 bg-white">

     </div>
   </button>


 </div>


 <div class="block w-full lg:w-auto block lg:flex lg:items-center lg:block-inline transition-all ease-in duration-500 hidden " id="navbar">
   <div class="lg:flex-grow text-2xl text-center ">
     <a class="block lg:inline-block hover:text-green-400" href="#">Home</a>
     <a class="block lg:inline-block hover:text-green-400" href="#">perfil</a>
     <a class="block lg:inline-block hover:text-green-400" href="#">store</a>
     <a class="block lg:inline-block hover:text-green-400 border rounded border-white hover:border-transparent
     hover:bg-white" href="#">Login / Sign up</a>

   </div>

 </div>   -->
