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
        $path = $request->file('picture')->store('heroes', 'public');

        HeroSection::create([
            'title' => $request->input('title'),
            'subTitle' => $request->input('subTitle'),
            'description' => $request->input('description'),
            'picture' => $path,
        ]);

        return redirect()->route('heroes.index')
                         ->with('success', 'Hero Section berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(HeroSection $hero)
    {
            return view('admin.heroes.heroShow', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $hero)
    {
        return view('admin.heroes.heroEdit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSection $hero)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'picture' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'title' => $request->input('title'),
            'subTitle' => $request->input('subTitle'),
            'description' => $request->input('description'),
        ];

        // Update gambar jika ada
        if ($request->hasFile('picture')) {
            // Hapus gambar lama
            if ($hero->picture) {
                Storage::delete($hero->picture);
            }

            // Simpan gambar baru
            $data['picture'] = $request->file('picture')->store('hero', 'public');
        }

        $hero->update($data);

        return redirect()->route('heroes.index')
                         ->with('success', 'Hero Section berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $hero)
    {
        // Hapus gambar
        if ($hero->picture) {
            Storage::delete($hero->picture);
        }

        $hero->delete();

        return redirect()->route('heroes.index')
                         ->with('success', 'Hero Section berhasil dihapus');
    }
}
