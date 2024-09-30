<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::all();
        return view('admin.heroIndex', compact('heroSections'));
    }

    public function create()
    {
        return view('admin.heroCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar
        $path = $request->file('picture')->store('public/images');

        HeroSection::create([
            'title' => $request->input('title'),
            'picture' => $path,
        ]);

        return redirect()->route('hero.index')
                         ->with('success', 'Hero Section berhasil ditambahkan');
    }


    public function edit($id)
    {
        $heroSection = HeroSection::findOrFail($id);
        return view('admin.heroEdit', compact('heroSection'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $heroSection = HeroSection::findOrFail($id);

        $data = [
            'title' => $request->input('title'),
        ];

        // Update gambar jika ada
        if ($request->hasFile('picture')) {
            // Hapus gambar lama
            if ($heroSection->picture) {
                Storage::delete($heroSection->picture);
            }

            // Simpan gambar baru
            $data['picture'] = $request->file('picture')->store('public/images');
        }

        $heroSection->update($data);

        return redirect()->route('hero.index')
                         ->with('success', 'Hero Section berhasil diperbarui');
    }

    public function destroy($id)
    {
        $heroSection = HeroSection::findOrFail($id);

        // Hapus gambar
        if ($heroSection->picture) {
            Storage::delete($heroSection->picture);
        }

        $heroSection->delete();

        return redirect()->route('hero.index')
                         ->with('success', 'Hero Section berhasil dihapus');
    }
}
