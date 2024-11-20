<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormContact;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class FormContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = FormContact::all();
        return view('admin.contact.index', compact('input'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'messages' => 'required',
        ]);

        FormContact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'messages' => $request->input('messages'),
        ]);

        return redirect()->route('home')->with('success', 'Thank you for your messages');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormContact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormContact $input)
    {
        $input->delete();

        return view('admin.contact.index');
    }
}
