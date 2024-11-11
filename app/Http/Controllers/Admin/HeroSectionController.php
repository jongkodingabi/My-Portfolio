<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSectionsCollection = HeroSection::all();
        return view('admin.heroes.heroIndex', compact('heroSectionsCollection'));
    }

        public function home()
        {
            $heroSectionsCollection = HeroSection::all(); // Pastikan variabel ini ada
            return view('/home', compact('heroSectionsCollection')); // Pastikan compact menggunakan variabel ini
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.heroes.heroCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar
        $path = $request->file('picture')->store('hero', 'public');

        HeroSection::create([
            'title' => $request->input('title'),
            'subTitle' => $request->input('subTitle'),
            'description' => $request->input('description'),
            'picture' => $path,
        ]);

        return redirect()->route('admin.heroes.heroIndex')
                         ->with('success', 'Hero Section berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(HeroSection $heroSection)
    {
            return view('admin.heroes.heroShow', compact('heroSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $heroSection)
    {
        $heroSection = HeroSection::findOrFail($heroSection);
        return view('admin.heroes.heroEdit', compact('heroSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSection $heroSection)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'picture' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $heroSection = HeroSection::findOrFail($heroSection);

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



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $heroSection)
    {
        // Hapus gambar
        if ($heroSection->picture) {
            Storage::delete($heroSection->picture);
        }

        $heroSection->delete();

        return redirect()->route('admin.heroes.heroIndex')
                         ->with('success', 'Hero Section berhasil dihapus');
    }
}
