@extends('layouts.loginhead')
@section('loginwrap')
    <!-- Pages:  Login: Boxed -->
    <!-- Page Container -->
    <div
    id="page-container"
    class="mx-auto flex h-screen w-full min-w-[320px] flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100"
    >
        <!-- Page Content -->
        <main id="page-content" class="flex max-w-full flex-auto flex-col">
            <div
            class="relative mx-auto flex min-h-dvh w-full max-w-10xl items-center justify-center overflow-hidden p-4 lg:p-8"
            >
            <!-- Sign In Section -->
            <section class="w-full max-w-xl py-6">
                <!-- Header -->
                <header class="mb-4 text-center">
                    <h1 class="mb-2 inline-flex items-center space-x-2 text-lg lg:text-2xl font-bold">
                        <img src="img/smk2.png" class="hi-cube-transparent inline-block h-12 w-12 text-blue-600 dark:text-blue-500">
                        <span>SMKN 2 Magelang</span>
                    </h1>
                    <h2 class="text-sm lg:font-medium text-gray-60">
                        Welcome, please Login to your dashboard
                    </h2>
                </header>
                <!-- END Header -->

                <!-- Sign In Form -->
                <div
                class="flex flex-col overflow-hidden rounded-lg bg-white shadow-lg dark:bg-gray-800 dark:text-gray-100"
                >
                <div class="grow px-5 py-6 lg:py-14 lg:px-16 ">
                    @error('username')
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close " data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                        
                    @enderror
                    <form class="space-y-6" action="{{ route('Auth') }}" method="POST">
                        @csrf
                    <div class="space-y-1">
                        <label for="username" class="text-sm font-medium">Username</label>
                        <div class="relative">
                            <i class="mdi mdi-account-outline text-xl absolute top-1/2 -translate-y-1/2 ml-3"></i>
                            <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Your Username"
                            class="block w-full rounded-lg border border-gray-200 px-9 lg:py-3 py-2 leading-6 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-blue-500"
                            />
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label for="myInput" class="text-sm font-medium"
                        >Password</label
                        >
                        <div class="relative">
                            <i class="mdi mdi-lock-outline absolute top-1/2 -translate-y-1/2 ml-3 text-xl"></i>
                            <input
                            type="password"
                            id="myInput"
                            name="password"
                            placeholder="Enter your password"
                            class="block w-full rounded-lg border border-gray-200 px-9 py-2 lg:py-3 leading-6 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-blue-500"
                            />
                            <div onclick="myFunction()" class="cursor-pointer">
                                <i id="hide1"
                                    class="mdi mdi-eye-off-outline text-black w-6 h-6 text-gray-800 absolute top-1/2 right-1 -translate-y-1/2 text-xl ">
                                </i>
                                <i id="hide2"
                                    class="mdi mdi-eye-outline  text-black w-6 h-6 text-gray-800 absolute top-1/2 right-1 -translate-y-1/2 text-xl">
                                </i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center space-x-2 rounded-lg border border-blue-700 bg-blue-700 px-6 py-2 lg:py-3 font-semibold leading-6 text-white hover:border-blue-600 hover:bg-blue-600 hover:text-white focus:ring focus:ring-blue-400 focus:ring-opacity-50 active:border-blue-700 active:bg-blue-700 dark:focus:ring-blue-400 dark:focus:ring-opacity-90"
                        >
                        <i class="mdi mdi-arrow-u-right-top text-gray-400 text-2xl"></i>
                        <span>Login</span>
                        </button>
                    </div>
                    </form>
                </div>
                </div>
                <!-- END Sign In Form -->

                <!-- Footer -->
                <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
                Powered by
                <a
                    href="javascript:void(0)"
                    class="font-medium text-blue-600 hover:text-blue-400 dark:text-blue-400 dark:hover:text-blue-300"
                    >Laravel Team</a
                >
                </div>
                <!-- END Footer -->
            </section>
            <!-- END Sign In Section -->
            </div>
        </main>
        <!-- END Page Content -->
    </div>
    <!-- END Page Container -->



    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("hide2");
            var z = document.getElementById("hide1");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
@endsection
