<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Content</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300">
    <nav class="bg-gray-800 w-full shadow-lg flex justify-between">
        <h2 class="text-white font-semibold text-xl p-5">News Content</h2>
        <div class="dropdown relative">
            <button class="bg-gray-800 text-white font-semibold py-2 px-4 rounded hover:bg-gray-700 mr-5 mt-4" id="dropdown-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2" />
                </svg>
            </button>
            <ul class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded shadow-md hidden" id="dropdown-menu">
                <li><a href="{{ url('Vtips') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Tips And Trick</a></li>
                <li><a href="{{  url('Vguides') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Guides</a></li>
                <li><a href="{{  url('dashboard') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Dashboard</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($Vnews as $news)
            <div class="bg-slate-200 rounded-lg shadow-md overflow-hidden ml-10">
                <img class="w-full object-cover" src="{{ $news->gambar_news }}" alt="{{ $news->nama_news }}">
                <div class="p-5">
                    <h3 class="text-lg font-semibold">{{ $news->nama_news }}</h3>
                    <p class="text-gray-600 mt-2 overflow-hidden text-ellipsis whitespace-normal">
                        {{ Str::limit($news->deskripsi_news, 100) }}
                        <span class="text-indigo-500 hover:text-indigo-700 cursor-pointer" onclick="showMore(this)">Read more</span>
                        <span class="hidden" id="more-text">{{ $news->deskripsi_news }} <span id="sembunyikan" class="text-indigo-500 hover:text-indigo-700 duration-200 cursor-pointer" onclick="hideMore(this)"> Hide</span></span>
                    </p>
                    <a href="{{ $news->video_news }}" target="_blank" class="text-indigo-500 hover:text-indigo-700 mt-4 inline-block">Lihat video tutorial</a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-600">No guides available</div>
            @endforelse
        </div>
    </div>

    <script>
        const dropdownBtn = document.getElementById('dropdown-btn');
        const dropdownMenu = document.getElementById('dropdown-menu');

        dropdownBtn.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.dropdown')) {
                dropdownMenu.classList.add('hidden');
            }
        });

        function showMore(element) {
            const moreText = element.nextElementSibling;
            moreText.classList.toggle('hidden');
            element.textContent = '';
            element.style.display = 'none';
        }

        function hideMore(element) {
            const moreText = element.parentNode;
            moreText.classList.toggle('hidden');
            const bacaSelengkapnyaButton = moreText.previousElementSibling;
            bacaSelengkapnyaButton.textContent = 'Baca Selengkapnya';
            bacaSelengkapnyaButton.style.display = 'inline-block';
        }
    </script>
</body>
</html>
