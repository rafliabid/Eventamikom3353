<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $partners = Partner::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo_url' => 'required|image'
        ]);

        $path = null;

        if ($request->hasFile('logo_url')) {
            $path = $request->file('logo_url')
                ->store('partners', 'public');
        }

        Partner::create([
            'name' => $request->name,
            'logo_url' => $path
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $path = $partner->logo_url;

        if ($request->hasFile('logo_url')) {
            $path = $request->file('logo_url')
                ->store('partners', 'public');
        }

        $partner->update([
            'name' => $request->name,
            'logo_url' => $path
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil diupdate');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus');
    }
}
