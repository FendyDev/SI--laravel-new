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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<script>
    $(document).ready(function() {
        $('#dt').DataTable();
    })
    $(document).ready(function() {
        $('#ls').DataTable();
    })
</script>
<style>
    .dataTables_wrapper .dataTables_filter input {
        color: rgb(0, 0, 0);
    }

    .dataTables_wrapper .dataTables_filter label {
        color: rgb(0, 0, 0);
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_processing,
    .dataTables_wrapper .dataTables_paginate {
        color: rgb(0, 0, 0);
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
        background-color: rgb(255, 255, 255);
        color: inherit;
        padding: 4px;
        font-size: 12px
    }
</style>

<body class="bg-slate-200 overflow-x-hidden ">

    <div class="w-screen ">
        @if (Auth::guard('web')->check() && Auth::guard('web')->user()->level == 'SuperAdmin')
            <nav class="border-gray-400 bg-gray-800  flex justify-between items-center px-5 py-3">
                <span class="s text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
                    <i class="mdi mdi-menu text-white text-3xl"></i>
                </span>
                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdownId"
                    data-dropdown-placement="bottom-start" class="w-10 h-10 cursor-pointer " src="img/smk2.png"
                    alt="User dropdown">

            </nav>

    </div>
    <aside
        class="sidebar z-10 fixed top-0 bottom-0  left[300px] p-2 w-[-300px] overflow-y-auto text-center bg-gray-900">
        <div class="text-gray-100 text-xl">
            <div class="p-2 flex items-center">
                <svg class="w-6 h-6 te  xt-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <h1 class="font-bold text-gray-200 text-[15px] ml-3 mt-1">S-Admin</h1>
                <svg class="bi bi-x ml-36 w-3 h-4 cursor-pointer" onclick="Open()" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </div>

            <div class="flex flex-col items-center mt-6 mx-2">
                <label for="first">
                    <a id="first" href="{{ route('profile') }}" class="text-white">
                        <i class="mdi mdi-pencil-circle w-9 absolute ml-6 mt-[70px] stroke-5 h-6"></i>
                        {{-- <input type="file" id="first" style="display: none;visibility: none;"> --}}
                        <img class="object-cover w-24 h-24 mx-2 rounded-full "
                        src="uploads/profile/{{ Auth::guard('web')->user()->image ?? 'p.jpg' }}" alt="avatar">
                    </a>
                </label>

                </button>
                <h4 class="mx-2 mt-2 font-medium text-gray-200">{{ Auth::guard('web')->user()->username }}</h4>
            </div>

            <hr class="my-2 text-gray-600">

        </div>

        {{-- <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700">
      <i class="bi bi-search text-sm"></i>
      <input type="text" placeholder="search" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none">
    </div> --}}

        <a href="{{ route('/') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                <span class="text-[15px] ml-4 text-gray-200">Dashboard</span>
            </div>
        </a>

        <a href="{{ route('lihat') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                </svg>
                <span class="text-[15px] ml-4 text-gray-200">Admin</span>
            </div>
        </a>

        <a href="{{ route('listStaf') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 19">
                    <path
                        d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                    <path
                        d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                </svg>
                <span class="text-[15px] ml-4 text-gray-200">Staff</span>
            </div>
        </a>

        <hr class="my-2 text-gray-600">
        <a href="{{ route('profile') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 14 18">
                    <path
                        d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
                <div class="text-[15px] ml-4 text-gray-200">Profile</div>

            </div>
        </a>


        <a href="{{ route('logout') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 16 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                </svg>
                <div class="text-[15px] ml-4 text-gray-200">Logout</div>
            </div>
        </a>



    </aside>
@elseif (Auth::guard('web')->check() && Auth::guard('web')->user()->level == 'Admin')
    <nav class="border-gray-400 bg-gray-800  flex justify-between items-center px-5 py-3">
        <span class="s text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
            <i class="mdi mdi-menu text-white text-3xl"></i>
        </span>
        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdownId"
            data-dropdown-placement="bottom-start" class="w-10 h-10 cursor-pointer " src="img/smk2.png"
            alt="User dropdown">

    </nav>

    </div>
    <aside
        class="sidebar z-10 fixed top-0 bottom-0  left[300px] p-2 w-[-300px] overflow-y-auto text-center bg-gray-900">
        <div class="text-gray-100 text-xl">
            <div class="p-2 flex items-center">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <h1 class="font-bold text-gray-200 text-[15px] ml-3 mt-1">Admin</h1>
                <svg class="bi bi-x ml-36 w-3 h-4 cursor-pointer" onclick="Open()" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </div>
            <div class="flex flex-col items-center mt-6 mx-2 relative">
                <label for="first">
                    <a id="first" href="{{ route('profile') }}" class="text-white">
                        <i class="mdi mdi-pencil-circle w-9 absolute ml-6 mt-[70px] stroke-5 h-6"></i>
                        {{-- <input type="file" id="first" style="display: none;visibility: none;"> --}}
                        <img class="object-cover w-24 h-24 mx-2 rounded-full "
                        src="uploads/profile/{{ Auth::guard('web')->user()->image ?? 'p.jpg' }}" alt="avatar">
                    </a>
                </label>

                <h4 class="mx-2 mt-2 font-medium text-gray-200">{{ Auth::guard('web')->user()->username }}</h4>
                <p class="mx-2 mt-1 text-sm font-medium text-gray-400">{{ Auth::guard('web')->user()->role }}</p>
            </div>
            <hr class="my-2 text-gray-600">
        </div>

        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700">
            <i class="bi bi-search text-sm"></i>
            <input type="text" placeholder="search"
                class="text-[15px] text-white ml-4 w-full bg-transparent focus:outline-none">
        </div>

        <a href="{{ route('/') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                <span class="text-[15px] ml-4 text-gray-200">Dashboard</span>
            </div>
        </a>

        <a href="{{ route('listStaf') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                    <path
                        d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                    <path
                        d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                </svg>
                <span class="text-[15px] ml-4 text-gray-200">Staff</span>
            </div>
        </a>

        <a href="{{ route('folder') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 18 18">
                    <path
                        d="M18 5H0v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5Zm-7.258-2L9.092.8a2.009 2.009 0 0 0-1.6-.8H2.049a2 2 0 0 0-2 2v1h10.693Z" />
                </svg>
                <span class="text-[15px] ml-4 text-gray-200">Folder</span>
            </div>
        </a>

        <hr class="my-2 text-gray-600">
        <a href="{{ route('profile') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">

                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                    <path
                        d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
                <div class="text-[15px] ml-4 text-gray-200">Profile</div>

            </div>
        </a>
        <a href="{{ route('logout') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">

                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                </svg>
                <div class="text-[15px] ml-4 text-gray-200">Logout</div>

            </div>
        </a>
    </aside>
@elseif (Auth::guard('staf')->check() && Auth::guard('staf')->user()->level == 'Staff')
    <nav class="border-gray-400 bg-gray-800  flex justify-between items-center px-5 py-3">
        <span class="s text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
            <i class="mdi mdi-menu text-white text-3xl"></i>
        </span>
        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdownId"
            data-dropdown-placement="bottom-start" class="w-10 h-10 cursor-pointer " src="img/smk2.png"
            alt="User dropdown">
    </nav>

    <aside
        class="sidebar z-10 fixed top-0 bottom-0  left[300px] p-2 w-[-300px] overflow-y-auto text-center bg-gray-900">
        <div class="text-gray-100 text-xl">
            <div class="p-2 flex items-center">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <h1 class="font-bold text-gray-200 text-[15px] ml-3 mt-1">Staff</h1>
                <svg class="bi bi-x ml-36 w-3 h-4 cursor-pointer" onclick="Open()" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </div>

            <div class="flex flex-col items-center mt-6 -mx-2">
                <label for="first">
                    <a id="first" href="{{ route('profile') }}" class="text-white">
                        <i class="mdi mdi-pencil-circle w-9 absolute ml-6 mt-[70px] stroke-5 h-6"></i>
                        {{-- <input type="file" id="first" style="display: none;visibility: none;"> --}}
                        <img class="object-cover w-24 h-24 mx-2 rounded-full "
                        src="uploads/profile/{{ Auth::guard('staf')->user()->image ?? 'p.jpg' }}" alt="avatar">
                    </a>
                </label>

                <h4 class="mx-2 mt-2 font-medium text-gray-200">{{ Auth::guard('staf')->user()->username }}</h4>
                <p class="mx-2 mt-1 text-sm font-medium text-gray-400">{{ Auth::guard('staf')->user()->role }}</p>
            </div>

            <hr class="my-2 text-gray-600">
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700">
            <i class="bi bi-search text-sm"></i>
            <input type="text" placeholder="search"
                class="text-[15px] ml-4 w-full bg-transparent focus:outline-none">
        </div>
        <a href="{{ route('/') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                <span class="text-[15px] ml-4 text-gray-200">Dashboard</span>
            </div>
        </a>


        <a href="{{ route('server') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 18 18">
                    <path
                        d="M18 5H0v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5Zm-7.258-2L9.092.8a2.009 2.009 0 0 0-1.6-.8H2.049a2 2 0 0 0-2 2v1h10.693Z" />
                </svg>
                <span class="text-[15px] ml-4 text-gray-200">Folder</span>
            </div>
        </a>
        </a>
        <hr class="my-2 text-gray-600">
        <a href="{{ route('profile') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                    <path
                        d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
                <div class="text-[15px] ml-4 text-gray-200">Profile</div>

            </div>
        </a>
        <a href="{{ route('logout') }}">
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                </svg>
                <div class="text-[15px] ml-4 text-gray-200">Logout</div>
            </div>
        </a>
    </aside>
    @endif
    </div>
    </div>

    @yield('container')


    <script>
        function Open() {
            document.querySelector('.sidebar').classList.toggle('left-[-300px]')
        };

        // let btn = document.getElementById('btn34')
        // let modal = document.getElementById('modals')
        // let cancel = document.getElementById('batals')
        // let overlay = document.getElementById('overlay')

        // btn.onclick = function() {
        //     modal.classList.remove('hidden')
        // }
        // cancel.onclick = function() {
        //     modal.classList.add('hidden')
        // }

        // window.onclick = function(event) {
        //     console.log(event)

        //     if (event.target = overlay) {
        //         modal.classList.add('hidden')
        //     }
        // }
    </script>

</body>



</html>
