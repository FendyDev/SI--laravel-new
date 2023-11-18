@extends('layouts.main')
@section('container')
<div class="container mx-auto ">
    <h2 class="mt-4 mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Staff</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Akun
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-white bg-dark ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Staff</h1>
                </div>
                <div class="modal-body text-white bg-dark ">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="/tambahStaf/create" method="POST">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                            <div class="sm:col-span-2">
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="text" name="username" id="username"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Username" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="nama_lengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nama Lengkap" required="">
                            </div>
                            @if (session()->get('level') == 'SuperAdmin')
                            <div class="w-full">
                                <label for="rl"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                <input type="text" name="role" id="rl"
                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Role" required="">
                            </div>
                            @else
                            <input type="hidden" name="role" value="{{ session()->get('role') }}">
                            @endif
                            <div class="sm:col-span-2">
                                <label for="pw"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="pw"
                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Password" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="disabled-input-2"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                                <input type="text" name="level" id="disabled-input-2" aria-label="disabled input 2"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="Staff" disabled readonly>
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <button type="submit" class="btn btn-primary">Tambah Akun</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



        <!-- Modal Edit-->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-white bg-dark ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                    </div>
                    <div class="modal-body text-white bg-dark ">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('update') }}" method="POST">
                            @csrf
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                                <div class="sm:col-span-2">
                                    <label for="username"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" name="username" id="username"
                                        class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Username" value="">
                                </div>
                                <div class="w-full">
                                    <label for="nama_lengkap"
                                        class="block mb-2 text-sm fontium text-gray-900 dark:text-white">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nama Lengkap" value="">
                                </div>
                                <div class="w-full">
                                    <label for="rl"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                    <input type="text" name="role" id="rl"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Role" value="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="pw"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="pw"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Password" value="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="disabled-input-2"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                                    <input type="text" name="level" id="disabled-input-2" aria-label="disabled input 2"
                                        class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="Admin" disabled readonly>
                                </div>
                            </div>
                            <div class="modal-footer mt-3">
                                <button type="submit" class="btn btn-primary">Edit Akun</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        {{-- <a href="/tambahStaf">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Staf</button>
        </a>
         --}}

        <table id="dt" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Lengkap
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $staf)
                @php
                $i = 1;
                @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $staf->username }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $staf->nama_lengkap }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $staf->role }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $staf->level }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="/editStaf/{{ $staf->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="/deleteStaf/{{ $staf->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
       // set the modal menu element
       const $targetEl = document.getElementById('modalEl');

// options with default values
const options = {
    placement: 'bottom-right',
    backdrop: 'dynamic',
    backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
    closable: true,
    onHide: () => {
        console.log('modal is hidden');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled');
    }
};
</script>
@endsection
