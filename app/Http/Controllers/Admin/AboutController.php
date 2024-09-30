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
            'images' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'date_of_birth' => 'required',
            'addres' => 'required',
            'email' => 'email',
            'phone_number' => 'required',
        ]);

        //save picture
        $path = $request->file('images')->store('public/images');

        About::create([
        'images' => $path,
        'name' => $request->input('name'),
        'date_of_birth' => $request->input('date_of_birth'),
        'addres' => $request->input('addres'),
        'email' => $request->input('email'),
        'phone_number' => $request->input('phone_number'),
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
            'images' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'date_of_birth' => 'required',
            'addres' => 'required',
            'email' => 'email',
            'phone_number' => 'required',
        ]);

        $path = $request->file('images')->store('public/images');

        $data = ([
            'images' => $path,
            'name' => $request->input('name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'addres' => $request->input('addres'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
        ]);

        if ($request->hasFile('images')){
            if ($about->images){
                Storage::delete('images');
            }
            $data['images'] = $request->file('images')->store('public/images');
        }
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
