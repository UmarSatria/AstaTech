@extends('layouts.sidebar')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ASTATECH | COURSE</title>

        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    </head>

    <body>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Add Course
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Create New Product
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
                    <form class="p-4 md:p-5" method="POST" action="{{ route('courses.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <!-- Nama Course -->
                            <div class="col-span-2">
                                <label for="nama_course"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama Course
                                </label>
                                <input type="text" name="nama_course" id="nama_course"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan nama course">
                            </div>

                            <!-- Jenis Course -->
                            <div class="col-span-1 sm:col-span-2" style="width: 375px;">
                                <label for="jenis_course"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Jenis Course
                                </label>
                                <input type="text" name="jenis_course" id="jenis_course"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan jenis course">
                            </div>

                            <!-- Materi Course -->
                            <div class="col-span-2">
                                <label for="materi_course"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Materi Course
                                </label>
                                <textarea id="materi_course" name="materi_course" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tulis materi course"></textarea>
                            </div>

                            <!-- Modul (Upload File) -->
                            <div class="col-span-2 sm:col-span-1" style="width: 375px;">
                                <label for="modul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Modul (upload file)
                                </label>
                                <input type="file" name="modul" id="modul" accept=".pdf,.doc,.docx,.ppt,.pptx"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>

                            <!-- Link Course -->
                            <div class="col-span-2">
                                <label for="link_course"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Link Course
                                </label>
                                <input type="url" name="link_course" id="link_course"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan link course">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add Course
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="margin-top: 30px;">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Course
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Course
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Materi Course
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Modul
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Link Course
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $course->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $course->nama_course }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $course->jenis_course }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $course->materi_course }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ asset('storage/' . $course->modul) }}" target="_blank"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">Download</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ $course->link_course }}"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">Visit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button data-modal-target="update-modal" data-modal-toggle="update-modal"
                                    class="block text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Update
                                </button>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        {{-- modal update --}}
        <div id="update-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Update Course
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="POST" action="{{ route('courses.update', $course->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <!-- Nama Course -->
                            <div class="col-span-2">
                                <label for="nama_course"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama Course
                                </label>
                                <input type="text" name="nama_course" id="nama_course"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan nama course" value="{{ $course->nama_course }}">
                            </div>

                            <!-- Jenis Course -->
                            <div class="col-span-1 sm:col-span-2" style="width: 375px;">
                                <label for="jenis_course"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Jenis Course
                                </label>
                                <input type="text" name="jenis_course" id="jenis_course"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan jenis course" value="{{ $course->jenis_course }}">
                            </div>

                            <!-- Materi Course -->
                            <div class="col-span-2">
                                <label for="materi_course"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Materi Course
                                </label>
                                <textarea id="materi_course" name="materi_course" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tulis materi course">{{ $course->materi_course }}</textarea>
                            </div>

                            <!-- Modul (Upload File) -->
                            <div class="col-span-2 sm:col-span-1" style="width: 375px;">
                                <label for="modul"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Modul (upload file)
                                </label>
                                <input type="file" name="modul" id="modul" accept=".pdf,.doc,.docx,.ppt,.pptx"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ asset('storage/' . $course->modul) }}">
                            </div>

                            <!-- Link Course -->
                            <div class="col-span-2">
                                <label for="link_course"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Link Course
                                </label>
                                <input type="url" name="link_course" id="link_course"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan link course" value="{{ $course->link_course }}">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Update Course
                        </button>
                    </form>


                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    </body>

    </html>
@endsection
