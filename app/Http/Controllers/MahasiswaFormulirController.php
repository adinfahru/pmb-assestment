<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirMahasiswa; // Pastikan Anda membuat model ini jika belum ada
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaFormulirController extends Controller
{
    public function index()
    {
        // Mengambil semua data formulir mahasiswa
        $formulirs = FormulirMahasiswa::all();
        $formulirs = FormulirMahasiswa::where('user_id', auth()->id())->get();

        // Menampilkan view dengan data formulir
        return view('mahasiswa.formulir.index', compact('formulirs'));
    }

    public function create()
    {
        return view('mahasiswa.formulir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_saat_ini' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'telepon' => 'required|numeric',
            'hp' => 'required|numeric',
            'email' => 'required|email|max:255|unique:formulir_mahasiswa,email',
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'provinsi_lahir' => 'required|string|max:255',
            'kota_kabupaten_lahir' => 'required_without:tempat_lahir_luar_negeri|string|max:255',
            'tempat_lahir_luar_negeri' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status_menikah' => 'required|in:Belum Menikah,Menikah,Cerai',
            'agama' => 'required|string|max:255',
        ]);

        // Check if the user has already submitted the form
        $existingForm = FormulirMahasiswa::where('user_id', auth()->id())->first();

        if ($existingForm) {
            return redirect()->back()->withErrors(['form' => 'Anda sudah mengisi formulir ini.']);
        }


        FormulirMahasiswa::create([
            'user_id' => auth()->id(),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_saat_ini' => $request->alamat_saat_ini,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'kecamatan' => $request->kecamatan,
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

        return redirect()->route('formulir-mahasiswa.index')->with('success', 'Formulir berhasil dikirim.');
    }

    public function edit()
    {
        // Get the existing form for the authenticated user
        $form = FormulirMahasiswa::where('user_id', auth()->id())->first();

        // Check if the form exists
        if (!$form) {
            return redirect()->route('formulir-mahasiswa.index')->withErrors(['form' => 'Formulir tidak ditemukan.']);
        }

        return view('mahasiswa.formulir.edit', compact('form'));
    }

    public function update(Request $request)
    {
        // Validate the input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_saat_ini' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
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

        // Find the existing form for the authenticated user
        $form = FormulirMahasiswa::where('user_id', auth()->id())->first();

        // Check if the form exists
        if (!$form) {
            return redirect()->route('formulir-mahasiswa.index')->withErrors(['form' => 'Formulir tidak ditemukan.']);
        }

        // Update the existing form
        $form->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_saat_ini' => $request->alamat_saat_ini,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'kecamatan' => $request->kecamatan,
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

        return redirect()->route('formulir-mahasiswa.index')->with('success', 'Formulir berhasil diperbarui.');
    }

    public function print($id)
    {
        $formulir = FormulirMahasiswa::findOrFail($id); // Find the formulir by ID
        $pdf = Pdf::loadView('formulir.pdf-view', compact('formulir')); // Load the PDF view
        return $pdf->download('formulir_' . $formulir->nama_lengkap . '.pdf'); // Download the PDF
    }

    public function review($id)
    {
        $formulir = FormulirMahasiswa::findOrFail($id);
        return view('formulir.review', compact('formulir'));
    }
}
