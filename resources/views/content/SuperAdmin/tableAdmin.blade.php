@extends('layouts.main')
@section('container')
    <div class="container px-5 mx-auto justify-center items-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h2 class="mt-4 mb-4 text-xl font-bold text-gray-900 light:text-black">Data Admin</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAdmin">
                Tambah Akun +
            </button>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session('success') }}
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
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-white bg-dark ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Admin</h1>
                        </div>
                        <div class="modal-body text-white bg-dark ">
                            <form action="{{ route('store') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                                    <div class="sm:col-span-2">
                                        <label for="username"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                        <input type="text" name="username" id="username"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Username" required>
                                            <div class="invalid-feedback">
                                                @if ($errors)
                                                    {{ $errors }}
                                                @endif
                                            </div>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="nama_lengkap"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="pw"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="pw"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="w-full">
                                        <label for="rl"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                        <select name="role" id="rl"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 cursor-pointer dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                            <option value="WKS 1">WKS 1</option>
                                            <option value="WKS 2">WKS 2</option>
                                            <option value="WKS 3">WKS 3</option>
                                            <option value="WKS 4">WKS 4</option>
                                        </select>
        
                                    </div>
                                    <div class="w-full">
                                        <label for="disabled-input-2"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                        <input type="text" name="level" id="disabled-input-2"
                                            aria-label="disabled input 2"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="Admin" disabled readonly>
                                    </div>
                                </div>
                                <div class="modal-footer mt-3">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}
            <!-- Modal Edit-->
            @foreach ($admin as $new)
                <div class="modal fade" id="edit-{{ $new->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-white bg-dark ">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                            </div>
                            <div class="modal-body text-white bg-dark ">
                                <form action="{{ route('update', $new->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                            <input type="text" name="username" id="username"
                                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                value="{{ $new->username }}" required>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="nama_lengkap"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Lengkap</label>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                value="{{ $new->nama_lengkap }}" required>
                                        </div>
                                        <div class="w-full">
                                            <label for="rl"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                            <select name="role" id="rl"
                                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 cursor-pointer dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                                <option value="WKS 1" {{ $new->role == 'WKS 1' ? 'selected' : '' }}>WKS 1</option>
                                                <option value="WKS 2" {{ $new->role == 'WKS 2' ? 'selected' : '' }}>WKS 2</option>
                                                <option value="WKS 3" {{ $new->role == 'WKS 3' ? 'selected' : '' }}>WKS 3</option>
                                                <option value="WKS 4" {{ $new->role == 'WKS 4' ? 'selected' : '' }}>WKS 4</option>
                                            </select>
                                        </div>
                                        <div class="w-full">
                                            <label for="disabled-input-2"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                            <input type="text" name="level" id="disabled-input-2"
                                                aria-label="disabled input 2"
                                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="Admin" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-3">
                                        <button type="submit" class="btn btn-success edit">Edit Akun</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <table class="mt-5 w-full text-sm text-left rtl:text-right text-gray-500 stripe"
                id="dt">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($admin as $view)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap ">
                                {{ $loop->iteration }}
                            </td>
                            <td scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->username }}
                            </td>
                            <td scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->nama_lengkap }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->role }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->level }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <form action="{{ route('delete', $view->id) }}" method="POST">
                                    @if (isset($view->id))
                                        <a href="{{ route('edit', $view->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#edit-{{ $view->id }}">
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
