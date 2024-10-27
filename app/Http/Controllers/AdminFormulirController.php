<?php

namespace App\Http\Controllers;

use App\Models\FormulirMahasiswa;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

class AdminFormulirController extends Controller
{
    // Show the list of student forms
    public function index()
    {
        $formulirs = FormulirMahasiswa::all(); // You may want to paginate this
        return view('admin.formulir.index', compact('formulirs'));
    }

    // Approve a specific form
    public function approve($id)
    {
        $form = FormulirMahasiswa::findOrFail($id);
        $form->status = 'diterima'; // Change status to approved
        $form->save();

        return redirect()->route('formulir.index')->with('success', 'Formulir approved successfully.');
    }

    public function reject($id)
    {
        $formulir = FormulirMahasiswa::findOrFail($id);
        $formulir->status = 'ditolak'; // Set the status to rejected
        $formulir->save();

        return redirect()->back()->with('success', 'Formulir berhasil ditolak.');
    }

    public function show($id)
    {
        $formulir = FormulirMahasiswa::findOrFail($id);
        
        // Ambil provinsi berdasarkan kode provinsi
        $province = Province::where('code', $formulir->provinsi)->first();

        // Ambil kota berdasarkan kode kota
        $city = City::where('code', $formulir->kota_kabupaten)->first();
        
        return view('admin.formulir.show', compact('formulir', 'province', 'city'));
    }
}
