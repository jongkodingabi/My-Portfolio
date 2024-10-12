<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }

    public function home()
    {
        $abouts = About::all();
        return view('/home', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        //save picture

        About::create([
        'title' => $request->input('title'),
        'subtitle' => $request->input('subtitle'),
    ]);

        return redirect()->route('admin.abouts.index')->with('success', 'Succsesfully added About');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);



        $data = ([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
        ]);

        $about->update($data);

        return redirect()->route('admin.abouts.index')->with('succsess, succsesfully updating About');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();

        return view('admin.abouts.index');
    }
}
