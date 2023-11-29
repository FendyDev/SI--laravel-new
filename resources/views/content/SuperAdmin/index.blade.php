@extends('layouts.main')
@section('container')

      <!-- <section>
         <div class="flex space-x-6 items-center  pt-48">
            <div class="text-white space-y-4 max-w-xl">
               <h1 class="text-6xl semi-bold leading-normal">WEB MANAGEMENT SYSTEM <span class="font-light">Smkn2 Magelang</span> </h1>
               <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt architecto amet rerum temporibus! Facilis voluptate odit 
                   ab doloribus veniam ullam unde aliquid, ut totam esse qui officiis, non recusandae sunt.</p>
            </div>
            <img src="img/smk2.png" alt="" srcset="" class="w-48">
         </div>
      </section> -->

      <!-- hero section start -->
      <section id="home" class="pt-36">
         <div class="container">
            <div class="flex flex-wrap ">
               <div class="w-full self-center px-4 lg:w-1/2">
                  <h1 class="text-base font-semibold text-blue-600 lg:text-2xl">Selamat Datang {{ Auth::guard('web')->user()->nama_lengkap }} 👋 , di <span class="block font-bold text-gray-700 text-3xl">Web Management System</span></h1>
                  <h2 class="font-medium text-gray-700 text-lg mb-5">SMK Negeri 2 Magelang</h2>
                  <p class="font-medium text-gray-700 mb-10 leading-relaxed"> Sebuah platform 
                inovatif yang memudahkan Anda mengunggah dan menyimpan hasil rapat dengan efisien. Temukan kenyamanan dan 
                kecepatan dalam berbagi informasi penting di dunia pendidikan.</p>
                      <a href="#" class="text-base  font-semibold text-white bg-blue-600 py-3 px-8 rounded-full 
                      hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">About Developers</a>
               </div>
               <div class="w-full self-end px-4 lg:w-1/2 ">
                  <div class="mt-10">
                     <img src="img/smk2.png" alt="smklog" class="max-w-full mx-auto scale-75 hover:animate-pulse lg:scale-175 ">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- hero section end -->

   <!-- <a href="{{ route('logout') }}" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Logout</a> -->
@endsection
