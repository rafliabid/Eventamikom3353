@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        Edit Partner
    </h1>

    {{-- Alert Error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.partners.update', $partner->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        {{-- Nama Partner --}}
        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Nama Partner
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $partner->name) }}"
                class="border p-2 rounded w-full"
            >

        </div>

        {{-- Logo Lama --}}
        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Logo Saat Ini
            </label>

            <img
                src="{{ asset('storage/' . $partner->logo_url) }}"
                alt="{{ $partner->name }}"
                class="w-32 h-32 object-cover rounded border"
            >

        </div>

        {{-- Upload Logo Baru --}}
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Ganti Logo
            </label>

            <input
                type="file"
                name="logo_url"
                class="border p-2 rounded w-full"
            >

            <small class="text-gray-500">
                Kosongkan jika tidak ingin mengganti logo
            </small>

        </div>

        {{-- Tombol --}}
        <div class="flex gap-3">

            <button
                type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded"
            >
                Update
            </button>

            <a
                href="{{ route('admin.partners.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded"
            >
                Kembali
            </a>

        </div>

    </form>

</div>
@endsection
