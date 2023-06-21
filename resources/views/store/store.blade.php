
@extends('layouts.app')

@section('content')



<!-- Slider main container -->
<div class="bg-gray-200">


<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"> <img src="https://img.ltwebstatic.com/images3_ach/2022/06/02/1654161965122febadbb9c4e58a595be9930d46a5a.jpg" alt=""> </div>
    <div class="swiper-slide"><img src="https://img.ltwebstatic.com/images3_ach/2022/06/07/16545648457ba17958876e0e6fa2ac315ba020295d.gif" alt=""> </div>
    <div class="swiper-slide">Slide 3</div>
    ...
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
</div>




<div class="overflow-x-hidden ">
  <div class="h-full w-screen place-items-center gap-x-4 gap-y-6 p-3 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

    <div class="space-y-2 bg-white rounded-lg">
      <div class="overflow-hidden  rounded-lg ">
        <img class="transform duration-300 hover:scale-110 hover:opacity-100 shadow-md" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />

      </div>
      <div >
        <h2 class="text-xl font-semibold text-gray-900"> algun titulo</h2>
        <h2 class="text-lg  text-gray-500"> algun titulo</h2>

      </div>
    </div>

    <div class=" rounded-lg space-y-2">
      <div class="w-f">

        <div class="overflow-hidden   bg-white rounded-lg   shadow-md db-white dark:border-gray-700">
            <a href="#">
                <img class="transform duration-300 hover:scale-110 hover:opacity-100 shadow-md " src="https://img.ltwebstatic.com/images3_pi/2022/02/24/1645668171137e5c952efbbd01a9787c262b108c6b_thumbnail_600x.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  dark:text-gray-800">Prueba Modelo</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021..</p>

            </div>
        </div>
      </div>

    </div>

    <div class=" rounded-lg transform duration-300 hover:scale-110  overflow-x-hidden ">
      <div class="w-f">

        <div class=" max-w-sm bg-white rounded-lg   shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
      </div>

    </div>


    <div class="space-y-2 ">
      <div class="overflow-hidden  rounded-md ">
        <img class="transform duration-300 hover:scale-110 hover:opacity-100 shadow-md" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />

      </div>
      <div >
        <h1 class="text-xl font-semibold text-gray-900"> algun titulo</h1>
        <h1 class="text-lg  text-gray-500"> algun titulo</h1>

      </div>
    </div>

    <div class="space-y-2 ">
      <div class="overflow-hidden  rounded-md ">
        <img class="transform duration-300 hover:scale-110 hover:opacity-100 shadow-md" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />

      </div>
      <div >
        <h1 class="text-xl font-semibold text-gray-900"> algun titulo</h1>
        <h1 class="text-lg  text-gray-500"> algun titulo</h1>

      </div>
    </div>

    <div class="space-y-2 ">
      <div class="overflow-hidden  rounded-md ">
        <img class="transform duration-300 hover:scale-110 hover:opacity-100 shadow-md" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />

      </div>
      <div >
        <h1 class="text-xl font-semibold text-gray-900"> algun titulo</h1>
        <h1 class="text-lg  text-gray-500"> algun titulo</h1>

      </div>
    </div>

    <div class="space-y-2 ">
      <div class="overflow-hidden  rounded-md ">
        <img class="transform duration-300 hover:scale-110 hover:opacity-100 shadow-md" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />

      </div>
      <div >
        <h1 class="text-xl font-semibold text-gray-900"> algun titulo</h1>
        <h1 class="text-lg  text-gray-500"> algun titulo</h1>

      </div>
    </div>

  </div>
</div>

</div>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
const swiper = new Swiper('.swiper', {
  // Optional parameters
  speed:1000,
  spaceBetween:80,
  autoplay:{
    delay:2000
  },

  // If we need pagination
/*  pagination: {
    el: '.swiper-pagination',
  },*/

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  /*scrollbar: {
    el: '.swiper-scrollbar',
  },*/
});
</script>





@endsection
