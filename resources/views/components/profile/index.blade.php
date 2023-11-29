@extends('layouts.main')
@section('container')
    @foreach ($data as $dt)
        <div class="container pt-8">
            <h1>Profile</h1>
            <div class="flex">
                @if (Auth::guard('web')->user())
                    <img class="object-cover w-24 h-24 mx-2 rounded-full"
                        src="uploads/profile/{{ Auth::guard('web')->user()->image ?? 'p.jpg' }}" alt="avatar">
                    <div class="flex flex-col items-start ">
                        <h4 class="mx-2 mt-2 font-medium text-black-200">{{ $dt->username }}</h4>
                        <p class="mx-2 mt-2 font-small text-black-200">{{ $dt->nama_lengkap }} | {{ $dt->role }}</p>
                    </div>
                @elseif(Auth::guard('staf')->user())
                    <img class="object-cover w-24 h-24 mx-2 rounded-full"
                        src="uploads/profile/{{ Auth::guard('staf')->user()->image ?? 'p.jpg' }}" alt="avatar">
                    <div class="flex flex-col items-start ">
                        <h4 class="mx-2 mt-2 font-medium text-black-200">{{ $dt->username }}</h4>
                        <p class="mx-2 mt-2 font-small text-black-200">{{ $dt->nama_lengkap }} | {{ $dt->role }}</p>
                    </div>
                @endif
            </div>

            {{-- <button type="button" title="Edit" class="btn btn-primary rounded-full" data-bs-toggle="modal"
                data-bs-target="#imageSA">
                Edit Profile
            </button> --}}
            {{-- <div class="mb-5">
            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" disabled>
            </div> --}}
            <div class="flex flex-col overflow-hidden rounded-lg bg-gray-900 shadow-lg mt-5 mx-auto lg:w-auto">
                <div class="p-4 lg:px-16 lg:py-12">
                    <h3 class="text-white">Edit Profile</h3>
                    <hr class="text-white">
                    <form action="{{ route('profile.update', $dt->id) }}" method="POST" class="needs-valdation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                            <div class="sm:col-span-2">
                                <label for="image"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
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
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
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
                                <label for="nama_lengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $dt->nama_lengkap }}" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="pw"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ganti
                                    Password</label>
                                <input type="text" name="password" id="pw"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="••••••••" required>
                            </div>
                            @if (session()->get('level') == 'Admin')
                                <div class="sm:col-span-2">
                                    <label for="rl"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select name="role" id="rl"
                                        class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        disabled readonly>
                                        <option value="WKS 1" {{ $dt->role == 'WKS 1' ? 'selected' : '' }}>WKS 1</option>
                                        <option value="WKS 2" {{ $dt->role == 'WKS 2' ? 'selected' : '' }}>WKS 2</option>
                                        <option value="WKS 3" {{ $dt->role == 'WKS 3' ? 'selected' : '' }}>WKS 3</option>
                                        <option value="WKS 4" {{ $dt->role == 'WKS 4' ? 'selected' : '' }}>WKS 4</option>
                                    </select>
                                </div>
                            @endif
                            <div class="sm:col-span-2">
                                <label for="disabled-input-2"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                <input type="text" name="level" id="disabled-input-2" aria-label="disabled input 2"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $dt->level }}" disabled readonly>
                            </div>
                        </div>
                        <div class="modal-footer mt-3 mr-3">
                            <button type="submit" title="Simpan Profile" class="btn btn-success">
                                <i class="mdi mdi-save"></i>
                                Simpan</button>
                        </div>

                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-floppy2" viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v3.5A1.5 1.5 0 0 1 11.5 6h-7A1.5 1.5 0 0 1 3 4.5V1H1.5a.5.5 0 0 0-.5.5m9.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
                                    </svg> --}}
                    </form>
                </div>
            </div>
    @endforeach


    </div>
@endsection
