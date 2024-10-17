@extends('layouts.sidebar')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ASTATECH | HOME</title>

        {{-- flowbite --}}
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    </head>

    <body>

        @if (!session('success'))
            <div id="marketing-banner" tabindex="-1"
                class="fixed z-50 flex flex-col md:flex-row justify-between w-[calc(100%-2rem)] p-4 -translate-x-1/2 bg-white border border-gray-100 rounded-lg shadow-lg shadow-black lg:max-w-7xl left-1/2 top-6 dark:bg-gray-700 dark:border-gray-600">
                <div class="flex flex-col items-start mb-3 me-4 md:items-center md:flex-row md:mb-0">
                    <a href="https://flowbite.com/"
                        class="flex items-center mb-2 border-gray-200 md:pe-4 md:me-4 md:border-e md:mb-0 dark:border-gray-600">
                        <img src="https://1.bp.blogspot.com/-Ho3hI-lQlg8/UuZjLf9vbxI/AAAAAAAAAHQ/TK-g2IB6zeo/s1600/rpl.png"
                            class="h-6 me-2" alt="AstaTech.">
                        <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">AstaTech.</span>
                    </a>
                    <p class="flex items-center text-sm font-normal text-gray-500 dark:text-gray-400">Selamat datang di
                        AstaTech
                        {{ $username }}</p>
                </div>
                <div class="flex items-center flex-shrink-0">
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400 pr-4">Silakan isi biodata lengkap anda di
                        tombol ini.</p>
                    {{-- btn biodata --}}
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-4 py-1.5 text-center dark:bg-green-600 dark:hover:bg-green-400 dark:focus:ring-green-800"
                        type="button">
                        Biodata
                    </button>
                    <button data-dismiss-target="#marketing-banner" type="button"
                        class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close banner</span>
                    </button>
                </div>
            </div>
        @endif

        {{-- modal biodata --}}
        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Biodata
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    @if (session('success'))
                        <!-- Tampilkan pesan sukses dan sembunyikan form -->
                        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @else
                        <!-- Form hanya akan muncul jika session 'success' tidak ada -->
                        <form class="p-4 md:p-5" method="POST" action="{{ route('biodata-siswa.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        lengkap</label>
                                    <input type="text" name="nama_lengkap" id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Isi nama lengkap anda" required>
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="jurusan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                    <select name="jurusan" id="jurusan" onchange="updateKelasOptions()"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Pilih jurusan</option>
                                        <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                                        <option value="TKJ">Teknik Komputer dan Jaringan (TKJ)</option>
                                        <option value="Mekatronika">Mekatronika (METRO)</option>
                                        <option value="Elin">Elektronika Industri (ELIN)</option>
                                    </select>
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="kelas"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                    <select name="kelas" id="kelas"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Pilih kelas</option>
                                    </select>
                                </div>

                                <div class="col-span-2">
                                    <label for="foto_profil"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Profil
                                        (Opsional)</label>
                                    <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        onchange="previewImage(event)">
                                    <img id="preview" src="#" alt="Preview Image" class="mt-4 hidden"
                                        width="200" height="200" />
                                </div>

                                <div class="col-span-2">
                                    <label for="bio"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio
                                        (Opsional)</label>
                                    <textarea name="bio" id="bio" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Opsional"></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Kirim
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        {{-- flowbite --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
        <script>
            function updateKelasOptions() {
                const jurusan = document.getElementById('jurusan').value;
                const kelasSelect = document.getElementById('kelas');

                // Hapus opsi kelas sebelumnya
                kelasSelect.innerHTML = '';

                // Tentukan opsi kelas berdasarkan jurusan
                let kelasOptions = [];
                if (jurusan === 'RPL') {
                    kelasOptions = ['12 RPL A', '12 RPL B', '12 RPL C', '12 RPL D'];
                } else if (jurusan === 'TKJ') {
                    kelasOptions = ['12 TKJ A', '12 TKJ B', '12 TKJ C', '12 TKJ D'];
                } else if (jurusan === 'Mekatronika') {
                    kelasOptions = ['12 METRO A', '12 METRO B'];
                } else if (jurusan === 'Elin') {
                    kelasOptions = ['12 ELIN A', '12 ELIN B'];
                }

                // Tambahkan opsi kelas baru
                kelasOptions.forEach(function(kelas) {
                    const option = document.createElement('option');
                    option.value = kelas;
                    option.text = kelas;
                    kelasSelect.appendChild(option);
                });
            }
        </script>

        {{-- PREVIEW GAMBAR --}}
        <script>
            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('preview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>

    </html>
@endsection
