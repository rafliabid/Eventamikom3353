@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="block mb-2">Nama Kategori</label>

            <input
                type="text"
                name="name"
                class="border p-2 rounded w-full"
            >

            @error('name')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <button
            type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</div>
@endsection
