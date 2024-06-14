<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#252c37]">
    <nav class="w-full bg-slate-200/20 backdrop-blur-sm rounded-br-full fixed z-50 flex items-center h-16">
        <h3 class="font-semibold text-xl pl-3 pr-3 text-stone-900">Management Tips</h3>
    </nav>

    <div class="container mx-auto p-4">
        <div class="flex items-center mb-4 flex-row mt-16">
            <button onclick="showCreateTipsForm()" class="mr-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition ease-out duration-500">
                Add New Tips
            </button>
            <a class="w-max bg-stone-400 px-2 py-1 rounded-lg font-medium text-lg text-white hover:bg-stone-700 transition ease-in-out duration-500 mr-3" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="w-max bg-orange-400 px-4 py-1 rounded-lg font-medium text-lg text-white hover:bg-orange-700 transition ease-in-out duration-500 mr-3" href="{{ route('news.index') }}">{{ __('News') }}</a>
            <a class="w-max bg-indigo-400 px-4 py-1 rounded-lg font-medium text-lg text-white hover:bg-indigo-700 transition ease-in-out duration-500" href="{{ route('guides.index') }}">{{ __('Guides') }}</a>
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
                @foreach ($Vtips as $tips)
                <tr class="border">
                    <td class="py-2 px-7 w-64">{{ $tips->nama_tips }}</td>
                    <td class="py-2 px-4 overflow-x-auto">
                        <div class="w-64 overflow-x-auto">
                            <a class="text-black font-normal hover:text-blue-400 transition ease-in-out duration-500" href="{{ $tips->gambar_tips }}" target="_blank">{{ $tips->gambar_tips }}</a>
                        </div>
                    </td>
                    <td class="py-2 px-4 overflow-x-scroll">
                        <a class="text-black font-normal hover:text-blue-400 transition ease-in-out duration-500" href="{{ $tips->video_tips }}" target="_blank">{{ $tips->video_tips }}</a>
                    </td>
                    <td class="py-2 px-4">
                        <div class="overflow-y-auto" style="max-height: 100px; max-width: 300px; width: 100%">
                            {{ $tips->deskripsi_tips }}
                        </div>
                    </td>
                    <td class="py-2 px-4 flex space-x-2 mt-2">
                        <button onclick="showEditTipsForm({{ json_encode($tips) }})" class="bg-orange-400 hover:bg-orange-700 text-white font-semibold transition duration-500 py-1 px-2 rounded">Edit</button>
                        <form action="{{ route('tips.destroy', $tips->id_tips) }}" method="POST" onsubmit="return confirmDelete(event, this);">
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
        function showCreateTipsForm() {
            Swal.fire({
                title: 'Add New Tips',
                html: `
                    <form id="createTipsFormElement" action="{{ route('tips.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_tips" class="block text-gray-700 font-bold mb-2">Tips Title</label>
                            <input type="text" name="nama_tips" id="nama_tips" class="shadow-md appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nama_tips') }}">
                        </div>
                        <div class="mb-4">
                            <label for="gambar_tips" class="block text-gray-700 font-bold mb-2">Tips Image</label>
                            <input type="text" name="gambar_tips" id="gambar_tips" class="shadow-md appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('gambar_tips') }}">
                        </div>
                        <div class="mb-4">
                            <label for="video_tips" class="block text-gray-700 font-bold mb-2">Tips Video</label>
                            <input type="text" name="video_tips" id="video_tips" class="shadow-md appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('video_tips') }}">
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi_tips" class="block text-gray-700 font-bold mb-2">Tips Description</label>
                            <textarea name="deskripsi_tips" id="deskripsi_tips" class="shadow-md appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi_tips') }}</textarea>
                        </div>
                    </form>
                `,
                showCancelButton: true,
                confirmButtonText: 'Save',
                preConfirm: () => {
                    document.getElementById('createTipsFormElement').submit();
                }
            });
        }

        function showEditTipsForm(tips) {
            Swal.fire({
                title: 'Edit Tips',
                html: `
                    <form id="editTipsFormElement" method="POST" action="/tips/${tips.id_tips}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="edit_nama_tips" class="block text-gray-700 font-bold mb-2">Tips Title</label>
                            <input type="text" name="nama_tips" id="edit_nama_tips" class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="${tips.nama_tips}">
                        </div>
                        <div class="mb-4">
                            <label for="edit_gambar_tips" class="block text-gray-700 font-bold">Tips Image</label>
                            <input type="text" name="gambar_tips" id="edit_gambar_tips" class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="${tips.gambar_tips}">
                        </div>
                        <div class="mb-4">
                            <label for="edit_video_tips" class="block text-gray-700 font-bold mb-2">Tips Video</label>
                            <input type="text" name="video_tips" id="edit_video_tips" class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="${tips.video_tips}">
                        </div>
                        <div class="mb-4">
                            <label for="edit_deskripsi_tips" class="block text-gray-700 font-bold mb-2">Tips Description</label>
                            <textarea name="deskripsi_tips" id="edit_deskripsi_tips" class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">${tips.deskripsi_tips}</textarea>
                        </div>
                    </form>
                `,
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: () => {
                    document.getElementById('editTipsFormElement').submit();
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
