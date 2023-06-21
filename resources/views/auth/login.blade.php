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
        <h1 class="text-4xl font-bold text-center text-white">Logo</h1>

      </header>

      <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-xl shadow-2xl">
        <section>
          <h3 class="font-bold text-2xl">Bienvenido a Logo</h3>
          <p class="text-gray-600 pt-2">Por favor inicia sesion para continuar</p>
        </section>

        <section class="mt-10">
        <!--  <form class="flex flex-col "  action="{{route('login')}}" method="POST"  > -->
            <!--csrf -->
            <div class="mb-6 pt-1 rounded bg-gray-200">
              <label class="block text-gray-700  text-sm font-bold  ml-3" for="email">Texto a enviar*</label>
              <input  type="text" id="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none  border-b-4 border-gray-300 focus:border-purple-600 transition duration-1000 px-3 ">
              @error('email')
              <p class="bg-red-200 text-red-700">{{$message}}</p>
              @enderror

            </div>


            <div class="mb-6 pt-1 rounded bg-gray-200">
              <label class="block text-gray-700  text-sm font-bold  ml-3" for="password">Texto recibido*</label>
              <input  id="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-1000 px-3">
              @error('password')
              <p class="bg-red-200 text-red-700">{{$message}}</p>
              @enderror
            </div>

            <div class="flex justify-end">
              <a href="" class="text-sm text-purple-600 hover:text-purple-700 hover:underline"> Olvidaste tu contraseña?</a>
            </div>

            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded-3xl shadow-2xl hover:shadow-xl" onclick = "loginTest()" name="button">Iniciar Sesion</button>


       <!--   </form> -->
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

      <script type="text/javascript">
        function loginTest() {
          //console.log("Este es el nombre del usuario")
          var email = document.getElementById("email").value;

          console.log(email)
          window.webkit.messageHandlers.logHandler.postMessagex(email)
        };

        function triggerFromMovil(apellido)  {
     // document.getElementById("email").innerHTML = apellido
        document.getElementById("password").value = apellido;

          console.log(apellido);
          return apellido
        };
      </script>

    </body>
</html>
