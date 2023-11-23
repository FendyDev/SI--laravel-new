@extends('layouts.main')
@section('container')


<section id="jadwal"></section>
    <div class="flex items-center justify-center min-h-screen container mx-auto"> 
        @if (session()->get('level') == 'Admin')
    <div class="text-center">
        <button class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-form" data-drawer-show="drawer-form" aria-controls="drawer-form">
        Tambah Jadwal
        </button>
     </div>
     
     <!-- drawer component -->
     <div id="drawer-form" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-form-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-3.5 h-3.5 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
         <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
       </svg>Tambah Jadwal Rapat</h5>
        <button type="button" data-drawer-hide="drawer-form" aria-controls="drawer-form" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
           <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
           </svg>
           <span class="sr-only">Close menu</span>
        </button>
        <form action="#" class="mb-6">
           <div class="mb-6">
              <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Rapat</label>
              <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul" required>
           </div>
           <div class="relative mb-6">
             <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal Rapat</label>
             <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 absolute top-12 left-3 -translate-y-1/2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                 <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
              <input datepicker="" datepicker-autohide datepicker-buttons="" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Pilih Tanggal">
           </div>
           <div class="relative mb-6">
             <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Rapat</label>
             <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 absolute top-12 left-2 -translate-y-1/2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                 <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
              <input datepicker="" datepicker-autohide datepicker-buttons="" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Pilih Tanggal">
           </div>
           <button type="submit" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><svg class="w-3.5 h-3.5 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
         <path d="M18 2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM2 18V7h6.7l.4-.409A4.309 4.309 0 0 1 15.753 7H18v11H2Z"/>
         <path d="M8.139 10.411 5.289 13.3A1 1 0 0 0 5 14v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .7-.288l2.886-2.851-3.447-3.45ZM14 8a2.463 2.463 0 0 0-3.484 0l-.971.983 3.468 3.468.987-.971A2.463 2.463 0 0 0 14 8Z"/>
       </svg> Buat Jadwal</button>
        </form>
     </div>@elseif(!session()->has('level'))
     @endif

    </div>
</section>

<section id="hasil">

    <div class="flex items-center justify-center min-h-screen container mx-auto"> 
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-20"> 
            @if (session()->get('level') == 'SuperAdmin' || session()->get('level') == 'Admin' || session()->get('role') == 'staf')
            
            <div class="w-full max-w-sm px-2 border-opacity-60 bg-gray-800 border border-gray-700 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="px-4 pt-16">
                    <!-- Dropdown menu -->
                    
                    <div class="flex flex-col items-center pb-10">
                        <button id="btn" class="w-24 h-24 mb-3 hover:bg-gray-100 rounded-full bg-gray-500 border border-blue-500 shadow-lg">
                            <svg class="w-10 h-10 m-auto text-black dark:text-black" aria-hidden="true" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button> 
                        <h5 class="mb-1 text-xl mt-3 font-medium text-white dark:text-white">Tambahkan Hasil Rapat</h5>
                    </div>
                </div>
            </div>
            
            @elseif(!session()->has('level'))
            @endif
            
            
            <div class="max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">Noteworthy technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-300 dark:text-gray-300">Lorem ipsum dolor s! Dignissimos eveniet dolor nihil.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            <div class="max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">Noteworthy technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-300 dark:text-gray-300">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore ullam aliquid incidunt laudantium nobis, numquam porro sunt nihil impedit ab quis aspernatur eum natus at quaerat facere ducimus explicabo deserunt?</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            <div class="max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">Noteworthy technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-300 dark:text-gray-300">Lorem ipsum dolor s! Dignissimos eveniet dolor nihil.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            <div class="max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">Noteworthy technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-300 dark:text-gray-300">Lorem ipsum dolor s! Dignissimos eveniet dolor nihil.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            
        </div>
    </div>
</section>
    
    
    
    
    
    
    <div id="modaljajal" class=" flex items-center justify-center hidden">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
            <div class="flex flex-col mx-auto pt-16  w-3/4">
                <div class=" bg-gray-800  shadow-md rounded-3xl p-5">
                    <div class="flex flex-col ">
                        <h2 class="font-semibold text-lg mr-auto text-white">Hasil Rapat</h2>
                        <div class="w-full mt-3">
                </div>
                <div class="mt-5">
                    <form action="" method="POST">
                        <div>
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 text-white">Judul Rapat</label>
                            <input type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-600 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="flex-auto w-full mb-1 text-xs space-y-2">
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 text-white">Isi Rapat</label>
                            <textarea class="h-40 w-full apperance-none block bg-gray-50 text-gray-600 border rounded-lg py-4 px-3 focus:outline-none">
                            </textarea>
                        </div>
                        <div class="mt-5 text-right flex flex-col-reverse md:space-x-3 md:block">
                            <a href="/" id="cancelbtn" class="mb-2 px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 focus:outline-none bg-white">CANCEL</a>
                            <a href="#" class="mb-2 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500 focus:outline-none">SAVE</a>
                        </div>
                         </form>
                    </div>
            </div>
       
        </div>
    </div>
</div>

</div>
    <script>
        let modal = document.getElementById('modaljajal')
        let btn = document.getElementById('btn')
        let tambah = document.getElementById('tambah')
        let btn2 = document.getElementById('button2')
        let cancel = document.getElementById('cancelbtn')
        let overlay = document.getElementById('overlay')
        

        btn.onclick = function() {
            modal.classList.remove('hidden')
        }
        cancel.onclick = function() {
            modal.classList.add('hidden')
        }

        window.onclick = function(event){
            console.log(event)

            if(event.target = overlay){
                modal.classList.add('hidden')
            }
        }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

    
@endsection