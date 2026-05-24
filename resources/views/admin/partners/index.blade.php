@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold">
            Data Partner
        </h1>

        <a
            href="{{ route('admin.partners.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded"
        >
            + Tambah Partner
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search --}}
    <form
        method="GET"
        action="{{ route('admin.partners.index') }}"
        class="mb-4"
    >

        <input
            type="text"
            name="search"
            placeholder="Cari partner..."
            value="{{ request('search') }}"
            class="border p-2 rounded w-full"
        >

    </form>

    <div class="bg-white shadow rounded overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-3">Logo</th>
                    <th class="border p-3">Nama</th>
                    <th class="border p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($partners as $partner)
                    <tr>

                        <td class="border p-3">
                            <img
                                src="{{ asset('storage/' . $partner->logo_url) }}"
                                class="w-20 h-20 object-cover rounded"
                            >
                        </td>

                        <td class="border p-3">
                            {{ $partner->name }}
                        </td>

                        <td class="border p-3 flex gap-2">

                            <a
                                href="{{ route('admin.partners.edit', $partner->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.partners.destroy', $partner->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin hapus?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border p-3 text-center">
                            Data partner kosong
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>
@endsection
