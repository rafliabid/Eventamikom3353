@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Kategori</h1>

        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Kategori
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search --}}
    <form method="GET" action="{{ route('admin.categories.index') }}" class="mb-4">
        <input
            type="text"
            name="search"
            placeholder="Cari kategori..."
            value="{{ request('search') }}"
            class="border p-2 rounded w-full"
        >
    </form>

    {{-- Table --}}
    <div class="bg-white shadow rounded overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-3 text-left">ID</th>
                    <th class="border p-3 text-left">Nama</th>
                    <th class="border p-3 text-left">Created At</th>
                    <th class="border p-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="border p-3">{{ $category->id }}</td>

                        <td class="border p-3">
                            {{ $category->name }}
                        </td>

                        <td class="border p-3">
                            {{ $category->created_at }}
                        </td>

                        <td class="border p-3 flex gap-2">

                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border p-3 text-center">
                            Data kategori belum ada
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
