<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Categories') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <a href="{{ route('admin.categories.create') }}" class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white rounded">Tambah Kategori</a>
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="py-2">Nama</th>
                            <th class="py-2">Slug</th>
                            <th class="py-2">Deskripsi</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                        <tr class="border-t">
                            <td class="py-2">{{ $cat->name }}</td>
                            <td class="py-2">{{ $cat->slug }}</td>
                            <td class="py-2">{{ Str::limit($cat->description, 80) }}</td>
                            <td class="py-2">
                                <a href="{{ route('admin.categories.edit', $cat) }}" class="mr-2 text-indigo-600">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
