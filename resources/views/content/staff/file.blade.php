@extends('layouts.main')
@section('container')
    <div class="container px-5 mx-auto justify-center items-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h2 class="mt-4 mb-4 text-xl font-bold text-gray-900 light:text-black">
                @foreach ($folder as $i)
                    {{ $i->nama_folder }}
                @endforeach
                Nama Folder
            </h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAdmin">
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
                            <form action="{{ route('addFileS') }}" method="POST" class="needs-validation"
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
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $loop->iteration }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->nama_file }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->pengirim }}
                            </td>
                            <td class="px-6 py-4 ont-medium text-gray-900 whitespace-nowrap">
                                {{ $view->role }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $view->created_at }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <form action="{{ route('deleteFileS', $view->id) }}" method="POST">
                                    <a href="uploads/documents/{{ $view->nama_file }}" class="btn btn-success"
                                        download="uploads/documents/{{ $view->nama_file }}"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                                            <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                          </svg></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn btn-danger">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
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