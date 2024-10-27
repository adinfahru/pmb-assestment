<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirMahasiswa extends Model
{

    protected $table = 'formulir_mahasiswa';

    protected $fillable = [
        'user_id',
        'status',
        'nama_lengkap',
        'alamat_ktp',
        'alamat_saat_ini',
        'provinsi',
        'kota_kabupaten',
        'telepon',
        'hp',
        'email',
        'kewarganegaraan',
        'tanggal_lahir',
        'provinsi_lahir',
        'kota_kabupaten_lahir',
        'tempat_lahir_luar_negeri',
        'jenis_kelamin',
        'status_menikah',
        'agama',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
