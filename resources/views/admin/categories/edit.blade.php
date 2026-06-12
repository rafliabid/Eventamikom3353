@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

    <form action="{{ route('admin.categories.update', $category->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-2">Nama Kategori</label>

            <input
                type="text"
                name="name"
                value="{{ $category->name }}"
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
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>
@endsection
