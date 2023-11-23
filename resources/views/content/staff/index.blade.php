@extends('layouts.main')
@section('container')
<section id="home" class="pt-36">
    <div class="container">
       <div class="flex flex-wrap ">
          <div class="w-full self-center px-4 lg:w-1/2">
             <h1 class="text-base font-semibold text-blue-600 lg:text-2xl">Selamat Datang 👋 , di <span class="block font-bold text-slate-50 text-3xl">Web Management System</span></h1>
             <h2 class="font-medium text-slate-500 text-lg mb-5">SMK Negeri 2 Magelang</h2>
             <p class="font-medium text-slate-100 mb-10 leading-relaxed"> Sebuah platform 
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
@endsection
