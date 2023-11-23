@extends('layouts.main')
@section('container')
    <div class="flex-col mt-5 ml-5 items-start justify-start  container mx-auto">
        <!-- Button trigger modal -->
    

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAdmin">
            Add Folder
        </button>
     
      

        {{-- <div class="relative">
            <label for="table-search" class="sr-only">Search</label>
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <input type="text" id="table-search-users"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for users">
            </div>
        </div> --}}

        <div class="relative overflow-x-auto shadow-md mt-3 w-full mx-auto sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <div>
                    {{-- <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Action
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button> --}}
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate
                                    account</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                User</a>
                        </div>
                    </div>
                </div>
                <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Folder
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    @foreach ($folder as $b)
                        <tbody>

                            <tr
                                class="bg-white text-gray-800 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">

                                </td>
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                                        viewBox="0 0 48 48">
                                        <linearGradient id="Om5yvFr6YrdlC0q2Vet0Ha_WWogVNJDSfZ5_gr1" x1="-7.018"
                                            x2="39.387" y1="9.308" y2="33.533" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fac017"></stop>
                                            <stop offset=".909" stop-color="#e1ab2d"></stop>
                                        </linearGradient>
                                        <path fill="url(#Om5yvFr6YrdlC0q2Vet0Ha_WWogVNJDSfZ5_gr1)"
                                            d="M44.5,41h-41C2.119,41,1,39.881,1,38.5v-31C1,6.119,2.119,5,3.5,5h11.597	c1.519,0,2.955,0.69,3.904,1.877L21.5,10h23c1.381,0,2.5,1.119,2.5,2.5v26C47,39.881,45.881,41,44.5,41z">
                                        </path>
                                        <linearGradient id="Om5yvFr6YrdlC0q2Vet0Hb_WWogVNJDSfZ5_gr2" x1="5.851"
                                            x2="18.601" y1="9.254" y2="27.39" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fbfef3"></stop>
                                            <stop offset=".909" stop-color="#e2e4e3"></stop>
                                        </linearGradient>
                                        <path fill="url(#Om5yvFr6YrdlC0q2Vet0Hb_WWogVNJDSfZ5_gr2)"
                                            d="M2,25h20V11H4c-1.105,0-2,0.895-2,2V25z"></path>
                                        <linearGradient id="Om5yvFr6YrdlC0q2Vet0Hc_WWogVNJDSfZ5_gr3" x1="2"
                                            x2="22" y1="19" y2="19" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fbfef3"></stop>
                                            <stop offset=".909" stop-color="#e2e4e3"></stop>
                                        </linearGradient>
                                        <path fill="url(#Om5yvFr6YrdlC0q2Vet0Hc_WWogVNJDSfZ5_gr3)"
                                            d="M2,26h20V12H4c-1.105,0-2,0.895-2,2V26z"></path>
                                        <linearGradient id="Om5yvFr6YrdlC0q2Vet0Hd_WWogVNJDSfZ5_gr4" x1="16.865"
                                            x2="44.965" y1="39.287" y2="39.792" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#e3a917"></stop>
                                            <stop offset=".464" stop-color="#d79c1e"></stop>
                                        </linearGradient>
                                        <path fill="url(#Om5yvFr6YrdlC0q2Vet0Hd_WWogVNJDSfZ5_gr4)"
                                            d="M1,37.875V38.5C1,39.881,2.119,41,3.5,41h41c1.381,0,2.5-1.119,2.5-2.5v-0.625H1z">
                                        </path>
                                        <linearGradient id="Om5yvFr6YrdlC0q2Vet0He_WWogVNJDSfZ5_gr5" x1="-4.879"
                                            x2="35.968" y1="12.764" y2="30.778" gradientUnits="userSpaceOnUse">
                                            <stop offset=".34" stop-color="#ffefb2"></stop>
                                            <stop offset=".485" stop-color="#ffedad"></stop>
                                            <stop offset=".652" stop-color="#ffe99f"></stop>
                                            <stop offset=".828" stop-color="#fee289"></stop>
                                            <stop offset="1" stop-color="#fed86b"></stop>
                                        </linearGradient>
                                        <path fill="url(#Om5yvFr6YrdlC0q2Vet0He_WWogVNJDSfZ5_gr5)"
                                            d="M44.5,11h-23l-1.237,0.824C19.114,12.591,17.763,13,16.381,13H3.5C2.119,13,1,14.119,1,15.5	v22C1,38.881,2.119,40,3.5,40h41c1.381,0,2.5-1.119,2.5-2.5v-24C47,12.119,45.881,11,44.5,11z">
                                        </path>
                                        <radialGradient id="Om5yvFr6YrdlC0q2Vet0Hf_WWogVNJDSfZ5_gr6" cx="37.836"
                                            cy="49.317" r="53.875" gradientUnits="userSpaceOnUse">
                                            <stop offset=".199" stop-color="#fec832"></stop>
                                            <stop offset=".601" stop-color="#fcd667"></stop>
                                            <stop offset=".68" stop-color="#fdda75"></stop>
                                            <stop offset=".886" stop-color="#fee496"></stop>
                                            <stop offset="1" stop-color="#ffe8a2"></stop>
                                        </radialGradient>
                                        <path fill="url(#Om5yvFr6YrdlC0q2Vet0Hf_WWogVNJDSfZ5_gr6)"
                                            d="M44.5,40h-41C2.119,40,1,38.881,1,37.5v-21C1,15.119,2.119,14,3.5,14h13.256	c1.382,0,2.733-0.409,3.883-1.176L21.875,12H44.5c1.381,0,2.5,1.119,2.5,2.5v23C47,38.881,45.881,40,44.5,40z">
                                        </path>
                                    </svg>

                                </th>
                                <td class="px-6 py-4">
                                    <a href="{{ route('inFolder', $b->id) }}">
                                        {{ $b->nama_folder }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $b->role }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('deleteFolder', $b->id) }}" method="POST">
                                        @if (isset($b->id))
                                            <a href="{{ route('editFolder', $b->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#edit-{{ $b->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </a>
                                        @endif
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>

            {{-- ADD FOLDER --}}
            <div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-white bg-dark ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Folder</h1>
                        </div>
                        <div class="modal-body text-white bg-dark ">
                            <form action="{{ route('createFolder') }}" method="POST" class="needs-validation"
                                novalidate>
                                @csrf
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                                    <div class="sm:col-span-2">
                                        <label for="username"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Folder</label>
                                        <input type="text" name="nama_folder" id="username"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Folder Name" required>
                                    </div>
                                    <div class="hidden sm:col-span-2">
                                        <label for="disabled-input-2"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                        <input type="text" name="role" id="disabled-input-2"
                                            aria-label="disabled input 2"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ Auth::user()->role }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="modal-footer mt-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            {{-- EDIT FOLDER --}}
            @foreach ($folder as $new)
                <div class="modal fade" id="edit-{{ $new->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-white bg-dark ">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Folder</h1>
                            </div>
                            <div class="modal-body text-white bg-dark ">
                                <form action="{{ route('updateFolder', $new->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Folder</label>
                                            <input type="text" name="nama_folder" id="username"
                                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Folder Name" value="{{ $new->nama_folder }}" required>
                                        </div>
                                        <div class="hidden sm:col-span-2">
                                            <label for="disabled-input-2"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                            <input type="text" name="role" id="disabled-input-2"
                                                aria-label="disabled input 2"
                                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ Auth::user()->role }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-3">
                                        <button type="submit" class="btn btn-success edit">Edit Folder</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Back</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



        <!-- Edit user modal -->
    @endsection
