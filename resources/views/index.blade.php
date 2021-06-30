<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Mexflix inicio</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        html {
            font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

    </style>
</head>

<body class="leading-normal tracking-normal text-indigo-400 m-6 bg-cover bg-fixed"
    style="background-image: url('img/landPage.png');">
    <div class="h-full">

      <!--Nav-->
      <div class="w-full container mx-auto">
        <div class="w-full flex items-center justify-between">
          <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-red-400 via-green-500 to-purple-500">Mexflix</span>
          </a>
          @if (Route::has('login'))
              <div class="hidden fixed top-2 right-8 px-6 py-4 sm:block">
                  @auth
                      <a href="{{ url('/content/main') }}" class="flex bg-gradient-to-r from-purple-800 to-green-500 hover:from-pink-500 hover:to-green-500 text-white font-bold py-2 px-4 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out">
                      Ingresar
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                      </svg>
                      </a>
                  @else
                    <a href="{{ route('login') }}" class="flex bg-gradient-to-r from-purple-800 to-green-500 hover:from-pink-500 hover:to-green-500 text-white font-bold py-2 px-4 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out">
                      Iniciar sesion
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                      </svg>
                    </a>
                    
                  @endauth
              </div>
          @endif
          
        </div>
      </div>

      <!--Main-->
      <div class="container pt-24 md:pt-36 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
          <h1 class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
            La 
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">
              plataforma mas esperada
            </span>
             de todo Mexico !
          </h1>
          <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
            Hola ! Ven y conoce todo lo que tenemos
            para ofrecerte hoy mismo 
          </p>

            </div>

            <!--Right Col-->
            <div class="w-full xl:w-3/5 p-12 overflow-hidden">
                <img class="mx-auto w-full md:w-4/5 transform -rotate-5 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
                    src="img/watch.svg" />
            </div>

            <div class="mx-auto md:pt-16">
                <p class="text-blue-400 font-bold pb-8 lg:pb-6 text-center">
                    Descarga nuestra aplicacion:
                </p>
                <div class="flex w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in">
                    <img src="img/App Store.svg"
                        class="h-12 pr-12 transform hover:scale-125 duration-300 ease-in-out" />
                    <img src="img/Play Store.svg" class="h-12 transform hover:scale-125 duration-300 ease-in-out" />
                </div>
            </div>

            <!--Footer-->
            <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
                <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; Mexflix 2021</a>
                - by
                <a class="text-gray-500 no-underline hover:no-underline" href="#">Mexflix Team</a>
            </div>
        </div>
    </div>
</body>

</html>
