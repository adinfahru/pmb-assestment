<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Calon Mahasiswa Baru</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
        }

        .input-box {
            display: inline-block;
            width: 25px;
            height: 25px;
            border: 1px solid #000;
            margin-right: 2px;
        }

        .input-line {
            display: block;
            margin-bottom: 10px;
        }

        .radio-group,
        .checkbox-group {
            margin-top: 5px;
        }

        .radio-group input,
        .checkbox-group input {
            margin-right: 5px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(40, 25px);
            gap: 2px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Formulir Pendaftaran <br> Calon Mahasiswa Baru</h1>

        <div class="form-group">
            <label class="form-label">1. Nama Lengkap : {{ $formulir->nama_lengkap }}</label>
        </div>

        <div class="form-group">
            <label class="form-label">2. Alamat KTP: {{ $formulir->alamat_ktp }}</label>
            <label class="form-label">Alamat Lengkap Saat Ini: {{ $formulir->alamat_saat_ini }}</label>
            <div class="input-line">Provinsi: {{ $province->name }}</div>
            <div class="input-line">Kota/Kabupaten: {{ $city->name }}</div>
            <div class="input-line">Nomor Telepon: {{ $formulir->telepon }}</div>
            <div class="input-line">Nomor HP: {{ $formulir->hp }}</div>
            <div class="input-line">Email: {{ $formulir->email }}</div>
        </div>

        <div class="form-group">
            <div class="input-line">3. Kewarganegaraan: {{ $formulir->kewarganegaraan }}</div>
        </div>

        <div class="form-group">
            <div class="input-line">4. Tanggal Lahir: {{ $formulir->tanggal_lahir }}</div>
        </div>

        <div class="form-group">
            <div class="input-line">5. Tempat Lahir</div>
            <div class="input-line">Provinsi Lahir: {{ $formulir->provinsi_lahir }}</div>
            <div class="input-line">Kota/Kabupaten Lahir: {{ $formulir->kota_kabupaten_lahir }}</div>
            <div class="input-line">Tempat Lahir Luar Negeri: {{ $formulir->tempat_lahir_luar_negeri }}</div>
        </div>

        <div class="form-group">
            <div class="input-line">6. Jenis Kelamin: {{ $formulir->jenis_kelamin }}</div>
        </div>

        <div class="form-group">
            <div class="input-line">7. Status Menikah: {{ $formulir->status_menikah }}</div>
        </div>

        <div class="form-group">
            <div class="input-line">8. Agama: {{ $formulir->agama }}</div>
        </div>
    </div>
</body>
</html>