<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.skillsIndex',  compact('skills'));
    }

    public function home(){
        $skills = Skill::all();
        return view('/home', compact('skills'));
    }

    public function countSkills() {
        $skills = SKill::count();
    
        return view('admin.dashboard', compact('skills'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.skillsCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'images' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        'title' => 'required',
        'link' => 'nullable',
        ]);

        //save picture
        $path = $request->file('images')->store('skills', 'public');

        Skill::create([
            'images' => $path,
            'title' => $request->input('title'),
            'link' => $request->input('link'),
        ]);

        return redirect()->route('admin.skills.skillsIndex')->with('success', 'sucsesfully added skills');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('admin.skills.skillsShow', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.skillsEdit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'images' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'title' => 'required',
            'link' => 'nullable',
        ]);

        $skill = Skill::findOrFail($id);

        $data = ([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'link' => $request->input('link'),
        ]);
        //update gambar jika ada
        if ($request->hasFile('images')){
            //hapus gambar yang lama
            if ($skill->images){
                Storage::delete($skill->images);
            }
            $data['images'] = $request->file('images')->store('skills', 'public');
        }
        $skill->update($data);
        
        return redirect()->route('admin.skills.skillsIndex')->with('success', 'updating skill');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.skillsIndex')->with('success', 'Skill deleted succsesfully.');
    }
}
