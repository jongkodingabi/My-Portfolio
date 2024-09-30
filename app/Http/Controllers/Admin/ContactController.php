<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'description' => 'required'
        ]);

        //save picture
        $path = $request->file('icon')->store('public/images');

        Contact::create([
            'icon' => $path,
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('admin.contact.index')->with('Succsess, succsesfully added contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'description' => 'required'
        ]);

        //save picture
        $path = $request->file('icon')->store('public/images');

        $data = ([
            'icon' => $path,
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        if ($request->hasFile('icon')){
            if ($contact->icon){
                Storage::delete('icon');
            }
            $data['icon'] = $request->file('icon')->store('public/images');
        }
        $contact->update($data);

        return redirect()->route('admin.contact.index')->with('Succsess, succsesfully updating contact');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return view('admin.contact.index');
    }
}
