<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#252c37]">
    <nav class="w-full bg-slate-200/20 backdrop-blur-sm rounded-br-full fixed z-50 flex items-center h-16">
        <h3 class="font-semibold text-xl pl-3 pr-3 text-stone-900">Management News</h3>
    </nav>

    <div class="container mx-auto p-4">
        <div class="flex items-center mb-4 flex-row mt-16">
            <button onclick="showCreateNewsForm()" class="mr-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition ease-out duration-500">
                Add New News
            </button>
            <a class="w-max bg-stone-400 px-2 py-1 rounded-lg font-medium text-lg text-white hover:bg-stone-700 transition ease-in-out duration-500 mr-3" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="w-max bg-orange-400 px-4 py-1 rounded-lg font-medium text-lg text-white hover:bg-orange-700 transition ease-in-out duration-500 mr-3" href="{{ route('guides.index') }}">{{ __('Guides') }}</a>
            <a class="w-max bg-indigo-400 px-4 py-1 rounded-lg font-medium text-lg text-white hover:bg-indigo-700 transition ease-in-out duration-500" href="{{ route('tips.index') }}">{{ __('Tips') }}</a>
        </div>

        <table class="min-w-full bg-zinc-300 backdrop-blur-sm shadow-xl rounded-lg overflow-hidden w-full">
            <thead>
                <tr class="bg-gray-400">
                    <th class="py-2 px-4 text-left">Title</th>
                    <th class="py-2 px-4 text-left">Image</th>
                    <th class="py-2 px-4 text-left">Video</th>
                    <th class="py-2 px-4 text-left">Description</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Vnews as $news)
                <tr class="border">
                    <td class="py-2 px-7 w-64">{{ $news->nama_news }}</td>
                    <td class="py-2 px-4 overflow-x-auto">
                        <div class="w-64 overflow-x-auto">
                            <a class="text-black font-normal hover:text-blue-400 transition ease-in-out duration-500" href="{{ $news->gambar_news }}" target="_blank">{{ $news->gambar_news }}</a>
                        </div>
                    </td>
                    <td class="py-2 px-4 overflow-x-scroll">
                        <a class="text-black font-normal hover:text-blue-400 transition ease-in-out duration-500" href="{{ $news->video_news }}" target="_blank">{{ $news->video_news }}</a>
                    </td>
                    <td class="py-2 px-4">
                        <div class="overflow-y-auto" style="max-height: 100px; max-width: 300px; width: 100%">
                            {{ $news->deskripsi_news }}
                        </div>
                    </td>
                    <td class="py-2 px-4 flex space-x-2 mt-2">
                        <button onclick="showEditNewsForm({{ json_encode($news) }})" class="bg-orange-400 hover:bg-orange-700 text-white font-semibold transition duration-500 py-1 px-2 rounded">Edit</button>
                        <form action="{{ route('news.destroy', $news->id_news) }}" method="POST" onsubmit="return confirmDelete(event, this);">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 font-semibold p-1 rounded-md text-white transition ease-in-out duration-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function showCreateNewsForm() {
            Swal.fire({
                title: 'Add New News',
                html: `
                    <form id="createNewsFormElement" action="{{ route('news.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_news" class="block text-gray-700 font-bold mb-2">News Title</label>
                            <input type="text" name="nama_news" id="nama_news" class="shadow-md appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nama_news') }}">
                        </div>
                        <div class="mb-4">
                            <label for="gambar_news" class="block text-gray-700 font-bold mb-2">News Image</label>
                            <input type="text" name="gambar_news" id="gambar_news" class="shadow-md appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('gambar_news') }}">
                        </div>
                        <div class="mb-4">
                            <label for="video_news" class="block text-gray-700 font-bold mb-2">News Video</label>
                            <input type="text" name="video_news" id="video_news" class="shadow-md appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('video_news') }}">
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi_news" class="block text-gray-700 font-bold mb-2">News Description</label>
                            <textarea name="deskripsi_news" id="deskripsi_news" class="shadow-md appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi_news') }}</textarea>
                        </div>
                    </form>
                `,
                showCancelButton: true,
                confirmButtonText: 'Save',
                preConfirm: () => {
                    document.getElementById('createNewsFormElement').submit();
                }
            });
        }

        function showEditNewsForm(news) {
            Swal.fire({
                title: 'Edit News',
                html: `
                    <form id="editNewsFormElement" method="POST" action="/news/${news.id_news}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="edit_nama_news" class="block text-gray-700 font-bold mb-2">News Title</label>
                            <input type="text" name="nama_news" id="edit_nama_news" class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="${news.nama_news}">
                        </div>
                        <div class="mb-4">
                            <label for="edit_gambar_news" class="block text-gray-700 font-bold">News Image</label>
                            <input type="text" name="gambar_news" id="edit_gambar_news" class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="${news.gambar_news}">
                        </div>
                        <div class="mb-4">
                            <label for="edit_video_news" class="block text-gray-700 font-bold mb-2">News Video</label>
                            <input type="text" name="video_news" id="edit_video_news" class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="${news.video_news}">
                        </div>
                        <div class="mb-4">
                            <label for="edit_deskripsi_news" class="block text-gray-700 font-bold mb-2">News Description</label>
                            <textarea name="deskripsi_news" id="edit_deskripsi_news" class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">${news.deskripsi_news}</textarea>
                        </div>
                    </form>
                `,
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: () => {
                    document.getElementById('editNewsFormElement').submit();
                }
            });
        }

        function confirmDelete(event, form) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}'
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
                });
            @endif
        });
    </script>
</body>
</html>
