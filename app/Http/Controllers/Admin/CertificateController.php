<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificates.certificatesIndex', compact('certificates'));
    }

    public function getCertificates(DataTables $dataTables)
    {
        $certificates = Certificate::select(['id', 'title', 'issued', 'date', 'file']);
        return $dataTables->of($certificates)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificates.certificateCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'issued' => 'required',
            'date' => 'required|date',
            'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);


           // Simpan file gambar
        $path = $request->file('file')->store('public/images');

        Certificate::create([
            'title' => $request->input('title'),
            'issued' => $request->input('issued'),
            'date' => $request->input('date'),
            'file' => $path,
        ]);

            return redirect()->route('admin.certificates.certificatesIndex')->with('sucsess', 'Certificate created succsesfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return view('admin.certificates.certificatesShow', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.certificatesEdit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'issued' => 'required',
            'date' => 'required|date',
            'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $certificate = Certificate::findOrFail($id);

        $data = ([
            'title' => $request->input('title'),
            'issued' => $request->input('issued'),
            'date' => $request->input('date'),
        ]);

        //update gambar jika ada
        if ($request->hasFile('file')) {
            //hapus gambar lama
            if ($certificate->file) {
                Storage::delete($certificate->file);
            }
            $data['file'] = $request->file('file')->store('public/images');
        }
        $certificate->update($data);

        return redirect()->route('admin.certificates.certificatesIndex')->with('sucsess', 'Certificate created succsesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return view('admin.certificates.certificatesIndex');
    }
}
