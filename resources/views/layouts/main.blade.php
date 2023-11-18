<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistem Informasi SMK Negeri 2 Magelang</title>
  <!-- Tailwind css -->
  <link rel="stylesheet" href="css/app.css">
  <!-- Icon SMK-->
  <link rel="shortcut icon" href="img/smk2.png">
  <!-- Datatables config -->
  <link rel="stylesheet" href="DataTables/datatables.min.css" type="text/css">
  <script src="DataTables/datatables.min.js" type="text/javascript"></script>
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>



</head>

<script>
  $(document).ready(function() {
    $('#dt').DataTable();
  })
</script>
<style>

  .dataTables_wrapper .dataTables_filter input {
    color: white;
    border-radius: 15px;
  }

  .dataTables_wrapper .dataTables_filter label {
    color: white;
  }

  .dataTables_wrapper .dataTables_length,
  .dataTables_wrapper .dataTables_filter,
  .dataTables_wrapper .dataTables_processing,
  .dataTables_wrapper .dataTables_paginate {
    color: white;
    margin-bottom: 2%;
    margin-top: 2%;
  }

  .dataTables_wrapper .dataTables_info {
    color: gray;
  }
  .dataTables_wrapper .dataTables_length select {
    border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color: black;
    color: inherit;
    padding: 4px;
}
</style>

<body class="bg-slate-950 overflow-hidden">

  <div class="w-screen ">
    @if ( Auth::guard('web')->check() && Auth::guard('web')->user()->level == 'SuperAdmin')
    <nav class="border-gray-400 bg-gray-800  flex justify-between items-center px-5 py-3">
      <span class="s text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
        <i class="mdi mdi-menu text-white text-3xl"></i>
      </span>
      <img id="avatarButton" type="button" data-dropdown-toggle="userDropdownId" data-dropdown-placement="bottom-start" class="w-10 h-10 cursor-pointer " src="img/smk2.png" alt="User dropdown">
  
    </nav>

  </div>
  <div class="sidebar z-10 fixed top-0 bottom-0  left[300px] p-2 w-[-300px] overflow-y-auto text-center bg-gray-900">
    <div class="text-gray-100 text-xl">
      <div class="p-2 flex items-center">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <h1 class="font-bold text-gray-200 text-[15px] ml-3">S-Admin</h1>
        <svg class="bi bi-x ml-36 w-3 h-4 cursor-pointer" onclick="Open()" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </div>

      <div class="flex flex-col items-center mt-6 -mx-2">
        <img class="object-cover w-24 h-24 mx-2 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar">
        <h4 class="mx-2 mt-2 font-medium text-gray-200">XhakimZo</h4>
        <p class="mx-2 mt-1 text-sm font-medium text-gray-400">azka@gmail.com</p>
      </div>

      <hr class="my-2 text-gray-600">

    </div>

    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700">
      <i class="bi bi-search text-sm"></i>
      <input type="text" placeholder="search" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none">
    </div>

    <a href="{{ route('/') }}">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
        </svg>
        <span class="text-[15px] ml-4 text-gray-200">Dashboard</span>
      </div>
    </a>

    <a href="{{ route('lihat') }}">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
          <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
        </svg>
        <span class="text-[15px] ml-4 text-gray-200">Admin</span>
      </div>
    </a>

    <a href="{{  route('listStaf') }}">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
          <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
        </svg>
        <span class="text-[15px] ml-4 text-gray-200">Staff</span>
      </div>
    </a>

    <a href="#folder">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
          <path d="M18 5H0v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5Zm-7.258-2L9.092.8a2.009 2.009 0 0 0-1.6-.8H2.049a2 2 0 0 0-2 2v1h10.693Z" />
        </svg>
        <span class="text-[15px] ml-4 text-gray-200">Folder</span>
      </div>
    </a>

    <hr class="my-2 text-gray-600">

    <a href="{{ route('logout')}}">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 15">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
        </svg>
        <div class="text-[15px] ml-4 text-gray-200">Logout</div>
      </div>
    </a>



  </div>
  @elseif (Auth::guard('web')->check() && Auth::guard('web')->user()->level == 'Admin')
  <nav class="border-gray-400 bg-gray-800  flex justify-between items-center px-5 py-3">
    <span class="s text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
      <i class="mdi mdi-menu text-white text-3xl"></i>
    </span>
    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdownId" data-dropdown-placement="bottom-start" class="w-10 h-10 cursor-pointer " src="img/smk2.png" alt="User dropdown">

  </nav>

  </div>
  <div class="sidebar z-10 fixed top-0 bottom-0  left[300px] p-2 w-[-300px] overflow-y-auto text-center bg-gray-900">
    <div class="text-gray-100 text-xl">
      <div class="p-2 flex items-center justify-between">
        <i class="mdi mdi-account-badge-outline text-white text-2xl cursor-pointer"></i>
        <!-- <h1 class="font-bold text-gray-200 text-[15px]">Admin</h1> -->
        <i class="mdi mdi-window-close text-white text-xl cursor-pointer" onclick="Open()"></i>
      </div>

      <div class="flex flex-col items-center mt-6 -mx-2">
        <img class="object-cover w-24 h-24 mx-2 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar">
        <h4 class="mx-2 mt-2 font-medium text-gray-200">XhakimZo</h4>
        <p class="mx-2 mt-1 text-sm font-medium text-gray-400">azka@gmail.com</p>
      </div>
      <hr class="my-2 text-gray-600">
    </div>

    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700">
      <i class="bi bi-search text-sm"></i>
      <input type="text" placeholder="search" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none">
    </div>

    <a href="/">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
        </svg>
        <span class="text-[15px] ml-4 text-gray-200">Dashboard</span>
      </div>
    </a>

    <a href="/tambahStaf">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
          <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
        </svg>
        <span class="text-[15px] ml-4 text-gray-200">Staff</span>
      </div>
    </a>

    <a href="/showFolder">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
          <path d="M18 5H0v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5Zm-7.258-2L9.092.8a2.009 2.009 0 0 0-1.6-.8H2.049a2 2 0 0 0-2 2v1h10.693Z" />
        </svg>
        <span class="text-[15px] ml-4 text-gray-200">Folder</span>
      </div>
    </a>

    <hr class="my-2 text-gray-600">
    <a href="{{ route('logout')}}">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">

        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 15">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
        </svg>
        <div class="text-[15px] ml-4 text-gray-200">Logout</div>

      </div>
    </a>



  </div>
  @elseif (Auth::guard('staf')->check() && Auth::guard('staf')->user()->level == 'Staff')
  <nav class="border-gray-400 bg-gray-800  flex justify-between items-center px-5 py-3">
    <span class="s text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
      <i class="mdi mdi-menu text-white text-3xl"></i>
    </span>
    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdownId" data-dropdown-placement="bottom-start" class="w-10 h-10 cursor-pointer " src="img/smk2.png" alt="User dropdown">

  </nav>

  </div>
  <div class="sidebar z-10 fixed top-0 bottom-0  left[300px] p-2 w-[-300px] overflow-y-auto text-center bg-gray-900">
    <div class="text-gray-100 text-xl">
      <div class="p-2 flex items-center justify-between">
        <i class="mdi mdi-account-circle-outline text-white text-2xl cursor-pointer"></i>
        <i class="mdi mdi-window-close text-white text-xl cursor-pointer" onclick="Open()"></i>
      </div>

      <div class="flex flex-col items-center mt-6 -mx-2">
        <img class="object-cover w-24 h-24 mx-2 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar">
        <h4 class="mx-2 mt-2 font-medium text-gray-200">XhakimZo</h4>
        <p class="mx-2 mt-1 text-sm font-medium text-gray-400">azka@gmail.com</p>
      </div>

      <hr class="my-2 text-gray-600">
    </div>
    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700">
      <i class="bi bi-search text-sm"></i>
      <input type="text" placeholder="search" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none">
    </div>
    <a href="#">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
          <i class="mdi mdi-folder-lock text-2xl"></i>
        <span class="text-[15px] ml-4 text-gray-200">File Saya</span>

      </div>
    </a>

    <a href="">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">

        <i class="mdi mdi-server text-2xl">
        </i>
        <span class="text-[15px] ml-4 text-gray-200">Server</span>

      </div>
    </a>
    <hr class="my-2 text-gray-600">
    <a href="{{ route('logout')}}">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 15">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
        </svg>
        <div class="text-[15px] ml-4 text-gray-200">Logout</div>
      </div>
    </a>
  </div>

  @endif
  </div>
  </div>

  @yield('container')


  <script>
    function Open() {
      document.querySelector('.sidebar').classList.toggle('left-[-300px]')
    };

    let btn = document.getElementById('btn34')
    let modal = document.getElementById('modals')
    let cancel = document.getElementById('batals')
    let overlay = document.getElementById('overlay')

    btn.onclick = function() {
      modal.classList.remove('hidden')
    }
    cancel.onclick = function() {
      modal.classList.add('hidden')
    }

    window.onclick = function(event) {
      console.log(event)

      if (event.target = overlay) {
        modal.classList.add('hidden')
      }
    }
  </script>


</body>

</html>
