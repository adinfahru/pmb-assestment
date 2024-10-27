<!DOCTYPE html>
<html>
<head>
    <title>Review Formulir</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Pastikan CSS sudah dimuat -->
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Review Formulir Pendaftaran Mahasiswa</h1>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p><strong>Nama Lengkap:</strong> {{ $formulir->nama_lengkap }}</p>
            <p><strong>Status:</strong> {{ $formulir->status }}</p>
            <p><strong>Tanggal Pendaftaran:</strong> {{ $formulir->created_at->format('d-m-Y') }}</p>
            <!-- Tambahkan informasi lain yang relevan -->

            <div class="mt-4">
                <a href="{{ route('formulir-mahasiswa.print', $formulir->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Print Formulir
                </a>
            </div>
        </div>
    </div>
</body>
</html>
