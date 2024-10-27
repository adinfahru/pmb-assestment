<!DOCTYPE html>
<html>
<head>
    <title>Formulir PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        p { margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Formulir Pendaftaran Mahasiswa</h1>
    <p><strong>Nama Lengkap:</strong> {{ $formulir->nama_lengkap }}</p>
    <p><strong>Status:</strong> {{ $formulir->status }}</p>
    <p><strong>Tanggal Pendaftaran:</strong> {{ $formulir->created_at->format('d-m-Y') }}</p>
    <!-- Add any other relevant details here -->
</body>
</html>
