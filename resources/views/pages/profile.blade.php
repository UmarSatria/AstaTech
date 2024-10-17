@extends('layouts.sidebar')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PROFILE | ASTATECH</title>

        {{-- flowbite --}}
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    </head>

    <body>

        <center>
            <div style="margin-top: 3rem;"
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-20">
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown"
                        class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                {{-- UPDATE PROFILE BTN --}}
                                <button data-modal-target="crud-modal" data-modal-toggle="update-modal"
                                    class="block text-dark hover:bg-white-800 focus:outline-none font-medium rounded-lg text-xs px-4 py-1.5 text-center dark:focus:ring-green-800"
                                    type="button">
                                    Edit
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    @foreach ($biodataSiswa as $siswa)

                    <!-- Gambar Profil -->
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                    src="{{ asset('storage/profiles/' . $siswa->foto_profil) }}"
                    alt="Foto Profil {{ $siswa->nama_lengkap }}" />
                    <!-- Alternatif teks untuk gambar -->

                    <!-- Nama Lengkap -->
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white" style="padding-bottom: 25px;">
                        {{ $siswa->nama_lengkap }} <!-- Menampilkan nama lengkap -->
                    </h5>

                    <!-- Jurusan -->
                    <span class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        Jurusan | {{ $siswa->jurusan }} <!-- Menampilkan jurusan -->
                    </span>

                    <!-- Kelas -->
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        Kelas | {{ $siswa->kelas }} <!-- Menampilkan kelas -->
                    </span>

                    {{-- BIO --}}
                    <span class="text-sm text-gray-500 dark:text-gray-400" style="padding-bottom: 20px;"></span>

                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $siswa->bio }} <!-- Menampilkan kelas -->
                    </span>
                    @endforeach
                </div>
            </div>
        </center>


        {{-- MODAL UPDATE PROFILE --}}

        {{-- flowbite --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    </body>

    </html>
@endsection
