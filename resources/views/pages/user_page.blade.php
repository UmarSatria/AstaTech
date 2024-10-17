@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USER | ASTATECH</title>

    {{-- flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Data Pengguna AstaTech.
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"> ~
                    Berikut adalah data Pengguna yang menggunakan Aplikasi AstaTech.
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID Pengguna</th>
                    <th scope="col" class="px-6 py-3">Username</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Password</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Edit</span></th>
                </tr>
            </thead>
            <tbody>
                @if ($user->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                    </tr>
                @else
                    @foreach ($user as $us)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $us->id }} <!-- Ganti jika perlu -->
                            </th>
                            <td class="px-6 py-4">{{ $us->name }}</td>
                            <td class="px-6 py-4">{{ $us->email }}</td>
                            <td class="px-6 py-4">{{ $us->password }}</td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
@endsection
