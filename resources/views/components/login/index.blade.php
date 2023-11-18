@extends('layouts.loginhead')
@section('loginwrap')

<!-- Pages: Sign In: Boxed -->
<!-- Page Container -->
<div id="page-container" class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
    <!-- Page Content -->
    <main id="page-content" class="flex max-w-full flex-auto flex-col">
        <div class="relative mx-auto flex min-h-screen w-full max-w-10xl items-center justify-center overflow-hidden p-4 lg:p-8">
            <!-- Sign In Section -->
            <section class="w-full max-w-xl py-6">
                <!-- Header -->
                <header class="mb-10 text-center">
                    <h1 class="mb-2 inline-flex items-center space-x-2 text-2xl font-bold">
                        <img src="img/smk2.png" class="hi-mini hi-cube-transparent inline-block h-5 w-5 text-blue-600 dark:text-blue-500">
                        <span>SMKN 2</span>
                    </h1>
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Welcome, please Login to your dashboard
                    </h2>
                </header>
                <!-- END Header -->

                <!-- Sign In Form -->
                <div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800 dark:text-gray-100">
                    <div class="grow p-5 md:px-16 md:py-12">
                        <form class="space-y-6" action="{{ route('Auth') }}" method="POST">
                            @csrf
                            <div class="space-y-1">
                                <label for="userName" class="text-sm font-medium">Username</label>
                                <input type="text" name="username" id="userName" placeholder="Enter your username" class="block w-full rounded-lg border border-gray-200 px-5 py-3 leading-6 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-blue-500" />
                            </div>
                            <div class="space-y-1">
                                <label for="password" class="text-sm font-medium">Password</label>
                                <div class="relative">
                                    <input type="password" id="myInput" name="password" placeholder="Enter your password" class="block w-full rounded-lg border border-gray-200 px-5 py-3 leading-6 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-blue-500" />
                                    <div onclick="myFunction()" class="cursor-pointer">
                                        <svg id="hide1" class="dark:text-white w-6 h-6 text-gray-800 absolute top-1/2 right-1 -translate-y-1/2 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <svg id="hide2" class="dark:text-white w-6 h-6 text-gray-800 absolute top-1/2 right-1 -translate-y-1/2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                            </g>
                                        </svg>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <button type="submit" class="inline-flex w-full items-center justify-center space-x-2 rounded-lg border border-blue-700 bg-blue-700 px-6 py-3 font-semibold leading-6 text-white hover:border-blue-600 hover:bg-blue-600 hover:text-white focus:ring focus:ring-blue-400 focus:ring-opacity-50 active:border-blue-700 active:bg-blue-700 dark:focus:ring-blue-400 dark:focus:ring-opacity-90">
                                    <svg class="hi-mini hi-arrow-uturn-right inline-block h-5 w-5 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.207 2.232a.75.75 0 00.025 1.06l4.146 3.958H6.375a5.375 5.375 0 000 10.75H9.25a.75.75 0 000-1.5H6.375a3.875 3.875 0 010-7.75h10.003l-4.146 3.957a.75.75 0 001.036 1.085l5.5-5.25a.75.75 0 000-1.085l-5.5-5.25a.75.75 0 00-1.06.025z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="grow bg-gray-50 p-5 text-center text-sm dark:bg-gray-700/50 md:px-16">
                        Don’t have an Cluster yet?
                        <a href="javascript:void(0)" class="font-medium text-blue-600 hover:text-blue-400 dark:text-blue-400 dark:hover:text-blue-300">Create Cluster</a>
                    </div>
                </div>

                <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
                    Powered by
                    <a href="javascript:void(0)" class="font-medium text-blue-600 hover:text-blue-400 dark:text-blue-400 dark:hover:text-blue-300">Laravel Team</a>
                </div>

            </section>

        </div>
    </main>

</div>


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