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

    public function edit($id)
    {
        $form = FormulirMahasiswa::findOrFail($id);
        $provinces = Province::all();

        // Ambil kota yang sesuai dengan provinsi dari data formulir
        $cities = City::where('province_code', $form->provinsi)->get();

        return view('admin.formulir.edit', compact('form', 'provinces', 'cities'));
    }


    public function update(Request $request, $id)
    {
        $form = FormulirMahasiswa::findOrFail($id);

        // Validate the input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_saat_ini' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'kewarganegaraan' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'provinsi_lahir' => 'required|string|max:255',
            'kota_kabupaten_lahir' => 'required|string|max:255',
            'tempat_lahir_luar_negeri' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|string',
            'status_menikah' => 'required|string',
            'agama' => 'required|string|max:50',
        ]);

        // Update the formulir details
        $form->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_saat_ini' => $request->alamat_saat_ini,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'telepon' => $request->telepon,
            'hp' => $request->hp,
            'email' => $request->email,
            'kewarganegaraan' => $request->kewarganegaraan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'provinsi_lahir' => $request->provinsi_lahir,
            'kota_kabupaten_lahir' => $request->kota_kabupaten_lahir,
            'tempat_lahir_luar_negeri' => $request->tempat_lahir_luar_negeri,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_menikah' => $request->status_menikah,
            'agama' => $request->agama,
        ]);

        return redirect()->route('formulir.index')->with('success', 'Formulir updated successfully.');
    }
}