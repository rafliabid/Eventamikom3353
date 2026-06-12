@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Partner
    </h1>

    <form
        action="{{ route('admin.partners.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="mb-4">
            <label class="block mb-2">Nama Partner</label>

            <input
                type="text"
                name="name"
                class="border p-2 rounded w-full"
            >
        </div>

        <div class="mb-4">
            <label class="block mb-2">Logo</label>

            <input
                type="file"
                name="logo_url"
                class="border p-2 rounded w-full"
            >
        </div>

        <button
            type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded"
        >
            Simpan
        </button>

    </form>

</div>
@endsection
