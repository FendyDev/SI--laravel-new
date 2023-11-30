@extends('layouts.main')
@section('container')
    <div class="flex-col mt-5 ml-5 items-start justify-start  container mx-auto">
        <h2 class="mt-4 mb-4 text-xl font-bold text-gray-900 light:text-black">Data Folder</h2>
        <!-- Button trigger modal -->
        <button title="Tambah" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAdmin">
            Tambah Folder +
        </button>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('delete') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
            </div>
            {{ session('error') }}
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
        <table id="dt" class=" text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NO.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Folder
                    </th>
                    <th scope="col" class="px-6 py-3 hidden lg:block">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            @foreach ($data as $b)
                <tbody>

                    <tr class="bg-white text-gray-800 border-b  hover:bg-gray-50 table-auto stripe">
                        <td class="w-4 p-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 max-w-xs text-xs font-medium text-gray-900">
                            <div class="flex">

                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
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
                                <p class="text-clip overflow-hidden line-clamp-2 pt-2">
                                    <a href="{{ route('open', [$b->id, $b->role]) }}"
                                        class="ml-2 no-underline uppercase pt-2 ">
                                        {{ $b->nama_folder }}
                                    </a>
                                </p>
                            </div>

                        </td>
                        <td class="px-6 py-4 hidden lg:grid">
                            {{ $b->role }}
                        </td>
                        <td class="px-6 py-4 text-xs max-w-xs font-medium text-gray-900 ">
                            <p class="text-clip overflow-hidden line-clamp-3">
                                {{ $b->created_at }}
                            </p>

                        </td>
                        <td class="px-6 py-4 ">
                            <form action="{{ route('deleteFolder', $b->id) }}" method="POST"
                                class="space-y-2 lg:space-y-0">
                                @if (isset($b->id))
                                    <a href="" title="Ubah"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#edit-{{ $b->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a href="">
                                @endif
                                @csrf
                                @method('DELETE')
                                <button title="Hapus" type="submit"
                                    class="font-medium text-blue-600 hover:underline btn btn-danger"  onclick="return confirm('Yakin ingin menghapus?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash3-fill " viewBox="0 0 16 16">
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
    <div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-white bg-dark ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Folder Baru</h1>
                </div>
                <div class="modal-body text-white bg-dark ">
                    <form action="{{ route('createFolder') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="role" value="{{ $role }}">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                            <div class="sm:col-span-2">
                                <label for="username" class="block mb-2 text-sm font-medium text-white">Nama
                                    Folder</label>
                                <input type="text" name="nama_folder" id="username"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Folder Name" required>
                            </div>
                            <div class="hidden sm:col-span-2">
                                <label for="disabled-input-2"
                                    class="block mb-2 text-sm font-medium text-white">Status</label>
                                <input type="text" name="role" id="disabled-input-2" aria-label="disabled input 2"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $role }}" disabled readonly>
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <button title="Kirim" type="submit" class="btn btn-success">Kirim</button>
                            <button title="Kembali" type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- EDIT FOLDER --}}
    @foreach ($data as $new)
        <div class="modal fade" id="edit-{{ $new->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-white bg-dark ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Folder</h1>
                    </div>
                    <div class="modal-body text-white bg-dark ">
                        <form action="{{ route('updateFolder', $new->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                                <div class="sm:col-span-2">
                                    <label for="username" class="block mb-2 text-sm font-medium text-white">Nama
                                        Folder</label>
                                    <input type="text" name="nama_folder" id="username"
                                        class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Folder Name" value="{{ $new->nama_folder }}" required>
                                </div>
                                <input type="hidden" name="role" value="{{ $role }}">
                            </div>
                            <div class="modal-footer mt-3">
                                <button title="Ubah" type="submit" class="btn btn-success edit">Ubah</button>
                                <button title="Kembali" type="button" class="btn btn-danger"
                                    data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
