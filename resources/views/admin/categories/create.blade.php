<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create Category') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="font-bold">Nama</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="font-bold">Slug</label>
                        <input type="text" name="slug" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="font-bold">Icon (path)</label>
                        <input type="text" name="icon" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="font-bold">Deskripsi</label>
                        <textarea name="description" class="w-full border rounded px-3 py-2" rows="4"></textarea>
                    </div>
                    <div>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded">Simpan</button>
                        <a href="{{ route('admin.categories.index') }}" class="ml-2 text-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
