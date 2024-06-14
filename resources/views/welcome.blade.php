<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wuthering Post</title>

    <!-- Fonts/cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #252c37;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
<script>
    function confirmLogin() {
        swal({
            title: "Anda harus login terlebih dahulu",
            text: "Tertarik Membacanya? Login Terlebih Dahulu",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = '{{ route('login') }}';
            }
        });
    }
    </script>
</head>
<body class="antialiased">
    <nav class="bg-slate-200/20 backdrop-blur-sm w-full flex fixed z-10 top-0 rounded-br-full">
        <h2 class="text-xl font-bold text-stone-900 p-4">Wuthering Post</h2>

        @if (Route::has('login'))
            <div class="hidden top-0 right-0 fixed mr-10 px-6 py-4 sm:block text-md font-medium">
                @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-stone-900 transition hover:text-gray-300 duration-300 pr-2">Logout</a>
                </form>
                    <a href="{{ url('/dashboard') }}" class=" text-stone-900 hover:text-gray-300 transition duration-300">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class=" text-stone-900 transition hover:text-gray-300 duration-300">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-stone-900 transition hover:text-gray-300 duration-300">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>

    <div class="flex justify-center mt-10">
        <div class=" mt-16 mx-auto p-4 bg-zinc-300 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-lg">
            <img src="/assets/img/ww.png" alt="Image" class="w-full object-cover rounded-t-lg">
            <div class="p-2">
                <h2 class="text-2xl font-bold text-stone-900">Welcome to Wuthering Post</h2>
                <p class="text-gray-600 pt-3" style="max-width: 1000px;">Wuthering Waves is set in a futuristic post-apocalyptic world after a disaster called the Lament wiped out most of humanity and caused the emergence of unknown creatures and monsters called the Tacet Discords. However, humanity quickly adapted to the threat and over time rebuilt civilization. The story follows an amnesiac Rover who awakens from his deep sleep and sets out to explore this new world.</p>
            </div>
        </div>
    </div>

    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0 mt-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class=" mt-24 bg-zinc-300/40 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-6">

                    <!-- Guides -->
                    <div class="px-8 rounded-lg py-5">
                        <h2 class="text-2xl font-semibold text-stone-900 mb-4">Guides</h2>
                        <div class="space-y-4">
                            @forelse($Vguides as $guide)
                                <div class="bg-zinc-300 shadow-lg p-4 rounded-lg">
                                    <h3 class="text-lg font-bold text-stone-900">{{ $guide->nama_game }}</h3>
                                    <p class="text-gray-600 pt-2" style="width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: normal; word-wrap: break-word;">
                                        {{ Str::limit($guide->deskripsi_game, 70) }}
                                        @if (strlen($guide->deskripsi_game) > 70)
                                            <a href="#" class="text-blue-600 hover:text-blue-900" onclick="confirmLogin()">Baca Selengkapnya</a>
                                        @endif
                                    </p>
                                </div>
                                @empty
                                <div class="col-span-full text-center text-gray-600">No guides available</div>
                            @endforelse
                        </div>
                    </div>

                    <!-- News -->
                    <div class="px-8 py-5 rounded-lg">
                        <h2 class="text-2xl font-semibold text-stone-900 mb-4">News</h2>
                        <div class="space-y-4">
                            @forelse($Vnews as $news)
                                <div class="bg-zinc-300 shadow-lg p-4 rounded-lg">
                                    <h3 class="text-lg font-bold text-stone-900">{{ $news->nama_news }}</h3>
                                    <p class="text-gray-600 pt-2" style="width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: normal; word-wrap: break-word;">
                                        {{ Str::limit($news->deskripsi_news, 70) }}
                                        @if (strlen($news->deskripsi_news) > 70)
                                            <a href="#" class="text-blue-600 hover:text-blue-900" onclick="confirmLogin()">Baca Selengkapnya</a>
                                        @endif
                                    </p>
                                </div>
                                @empty
                                <div class="col-span-full text-center text-gray-600">No News available</div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Tips -->
                    <div class="px-8 py-5 rounded-lg">
                        <h2 class="text-2xl font-semibold text-stone-900 mb-4">Tips</h2>
                        <div class="space-y-4">
                            @forelse($Vtips as $tips)
                                <div class="bg-zinc-300 shadow-lg p-4 rounded-lg">
                                    <h3 class="text-lg font-bold text-stone-900">{{ $tips->nama_tips }}</h3>
                                    <p class="text-gray-600 pt-2" style="width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: normal; word-wrap: break-word;">
                                        {{ Str::limit($tips->deskripsi_tips, 70) }}
                                        @if (strlen($tips->deskripsi_tips) > 70)
                                            <a href="#" class="text-blue-600 hover:text-blue-900" onclick="confirmLogin()">Baca Selengkapnya</a>
                                        @endif
                                    </p>
                                </div>
                                @empty
                                <div class="col-span-full text-center text-gray-600">No Tips available</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <a href="https://github.com/FchDxCode" class="ml-1 underline" target="_blank">
                            My Github Account
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    copyright F4 2024
                </div>
            </div>
        </div>
    </div>
</body>
</html>
