@extends('layouts.main')
@section('container')
    <div class="container px-2 mx-10 justify-center items-center">
        <div class="relative">
            <h2 class="mt-4 mb-4 text-xl font-bold text-gray-900 light:text-black">Data Files</h2>
            <!-- Button trigger modal -->
            <button title="Tambah" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAdmin">
                Tambah File +
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create File</h1>
                        </div>
                        <div class="modal-body text-white bg-dark ">
                            <form action="{{ route('addFile') }}" method="POST" class="needs-validation"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-3">
                                    <div class="sm:col-span-2">
                                        <label for="file"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            File</label>
                                        <input type="file" name="document" id="document"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="File" required>
                                    </div>
                                    <input type="hidden" name="pengirim">
                                    <input type="hidden" name="id_folder" value="{{ $id_folder }}">
                                    <div class="hidden sm:col-span-2">
                                        <label for="disabled-input-2"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                        <input type="text" name="role" id="disabled-input-2"
                                            aria-label="disabled input 2"
                                            class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-600 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ Auth::user()->role ?? Auth::guard('staf')->user()->role }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="modal-footer mt-3">
                                    <button title="Kirim" type="submit" class="btn btn-success">Kirim</button>
                                    <button title="Kembali" type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:hidden overflow-x-scroll">

                <table class=" mt-5 text-sm text-left rtl:text-right text-gray-500  table-auto stripe"
                id="ls">
                <thead class="text-xs text-gray-200  bg-gray-50  ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama File
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($folder as $view)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-4 py-4  font-medium text-gray-900 whitespace-nowrap ">
                                {{ $loop->iteration }}
                            </th>
                            <th scope="row" class="px-6 py-4 max-w-xs  text-xs font-medium text-gray-900 ">
                                <p class="text-clip overflow-hidden line-clamp-2">
                                    {{ $view->nama_file }}
                                </p>
                            </th>
                         
                            <th scope="row" class="px-6 py-4 text-xs max-w-xs  font-medium text-gray-900 ">
                                <p class="text-clip overflow-hidden line-clamp-2">
                                    {{ $view->created_at }}
                                </p>
                            </th>
                            <td class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <form action="{{ route('deleteFile', $view->id) }}" method="POST">
                                    <a title="Download" href="uploads/documents/{{ $view->nama_file }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-2 no-underline py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                    download="uploads/documents/{{ $view->nama_file }}"><i class="mdi mdi-download" style="font-size: 18px"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button title="Hapus" title="Hapus" type="submit"
                                    class="focus:outline-none -ml-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-2 py-1.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        <i class="mdi mdi-delete" style="font-size: 17px"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                </div>
                <div class="hidden lg:block">
                    
                <table class=" mt-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto stripe"
                id="dt">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama File
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pengirim
                        </th>
                        <th scope="col" class="px-6 py-3">
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
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($folder as $view)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap ">
                                {{ $loop->iteration }}
                            </th>
                            <th scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap">
                                    {{ $view->nama_file }}
                            </th>
                            <th scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->pengirim }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->role}}
                            </td>
                            <th scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->created_at }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <form action="{{ route('deleteFile', $view->id) }}" method="POST">
                                    <a title="Download" title="Ubah" href="uploads/documents/{{ $view->nama_file }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn btn-success"
                                    download="uploads/documents/{{ $view->nama_file }}">Download</a>
                                    @csrf
                                    @method('DELETE')
                                    <button title="Hapus" title="Hapus" type="submit"
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
