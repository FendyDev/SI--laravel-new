@extends('layouts.main')
@section('container')
    @foreach ($data as $dt)
        <div class="container pt-8 mb-10">
            <h1>Profile</h1>
            <div class="flex justify-between">
                <div class="flex">
                    @if (Auth::guard('web')->user())
                        <img class="object-cover w-24 h-24 mx-2 rounded-full"
                            src="uploads/profile/{{ Auth::guard('web')->user()->image ?? 'p.jpg' }}" alt="avatar">
                        <div class="flex flex-col items-start ">
                            <h4 class="mx-2 mt-2 font-medium text-black-200">{{ $dt->nama_lengkap }}</h4>
                            <p class="mx-2 mt-2 font-small text-black-200">{{ $dt->username }} | {{ $dt->role }}</p>
                        </div>
                    @elseif(Auth::guard('staf')->user())
                        <img class="object-cover w-24 h-24 mx-2 rounded-full"
                            src="uploads/profile/{{ Auth::guard('staf')->user()->image ?? 'p.jpg' }}" alt="avatar">
                        <div class="flex flex-col items-start ">
                            <h4 class="mx-2 mt-2 font-medium text-black-200">{{ $dt->nama_lengkap }}</h4>
                            <p class="mx-2 mt-2 font-small text-black-200">{{ $dt->username }} | {{ $dt->role }}</p>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col items-end scale-75 lg:scale-100">
                    <form action="{{ route('hapus') }}" method="POST" class="needs-valdation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button title="Hapus" class="btn btn-danger mt-3 mr-3 ">
                            <i class="mdi mdi-delete"></i>Hapus Profile
                        </button>
                    </form>
                </div>
            </div>

            <div class="flex flex-col overflow-hidden rounded-lg bg-gray-800 shadow-lg mt-3 mx-auto lg:w-auto">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-4 mx-4" role="alert">
                        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('delete'))
                <div class="alert alert-danger alert-dismissible fade show mt-4 mx-4" role="alert">
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
                    <div class="alert alert-danger alert-dismissible fade show mt-2 mx-2" role="alert">
                        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="p-4 lg:px-16 lg:py-12">
                    <h3 class="text-white">Ubah Profile</h3>
                    <hr class="text-white">
                    <form action="{{ route('profile.update', $dt->id) }}" method="POST" class="needs-valdation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-2 sm:grid-cols-2 sm:gap-3 mb-3">
                            <div class="sm:col-span-2">
                                <label for="image" class="block mb-2 text-sm font-medium text-white">Profile
                                    Image</label>
                                <input type="file" name="image" id="image"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $dt->image }}" required>
                                <div class="invalid-feedback">
                                    @if ($errors)
                                        {{ $errors }}
                                    @endif
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="username" class="block mb-2 text-sm font-medium text-white">Username</label>
                                <input type="text" name="username" id="username"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $dt->username }}" required>
                                <div class="invalid-feedback">
                                    @if ($errors)
                                        {{ $errors }}
                                    @endif
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-white">Nama
                                    Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $dt->nama_lengkap }}" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="pw" class="block mb-2 text-sm font-medium text-white">Ganti
                                    Password</label>
                                <input type="password" name="password" id="pw"
                                    value="{{ $dt->password }}"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="••••••••" required>
                            </div>
                            {{-- @if (!Auth::guard('web')->check() || Auth::guard('web')->user()->level == 'SuperAdmin')
                                    <div class="sm:col-span-2">
                                        <label for="rl" class="block mb-2 text-sm font-medium text-white">Status</label>
                                        <input type="text" name="role" id="rl"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{ $dt->role }}" required>
                                    </div>
                                    <input type="hidden" name="role" value="{{ $dt->role }}">
                            @elseif (Auth::guard('web')->user()->level == 'Admin' || (Auth::guard('staf')->user()->level == 'Staff')) --}}
                                <div class="sm:col-span-2">
                                    <label for="rl" class="block mb-2 text-sm font-medium text-white">Status</label>
                                    <input type="text" name="role" id="rl" aria-label="disabled input 2"
                                        class="bg-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $dt->role }}" disabled readonly>
                                </div>
                                <input type="hidden" name="role" value="{{ $dt->role }}">
                            {{-- @endif --}}
                            <div class="sm:col-span-2">
                                <label for="disabled-input-2" class="block mb-2 text-sm font-medium text-white">Role</label>
                                <input type="text" name="level" id="disabled-input-2" aria-label="disabled input 2"
                                    class="bg-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $dt->level }}" disabled readonly>
                            </div>
                            <input type="hidden" name="level" value="{{ $dt->level }}">
                        </div>
                        <div class="modal-footer mt-3">
                            <button type="submit" title="Simpan Profile" class="btn btn-success">
                                <i class="mdi mdi-content-save"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
    @endforeach


    </div>
@endsection
