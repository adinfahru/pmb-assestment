<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Detail Formulir Mahasiswa</h1>

        <div class="bg-white shadow-md rounded-lg p-6">

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Status:</label>
                <p class="mt-1 text-sm font-bold capitalize {{ $formulir->status == 'pending' ? 'text-yellow-500' : ($formulir->status == 'ditolak' ? 'text-red-500' : 'text-green-500') }}">
                    {{ $formulir->status }}
                </p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->created_at->format('d-m-Y H:i:s') }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->nama_lengkap }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Alamat KTP:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->alamat_ktp }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Alamat Saat Ini:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->alamat_saat_ini ?? 'Tidak ada' }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Provinsi:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->provinsi }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kota/Kabupaten:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->kota_kabupaten }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kecamatan:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->kecamatan }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Telepon:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->telepon ?? 'Tidak ada' }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">HP:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->hp }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->email }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kewarganegaraan:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->kewarganegaraan }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->tanggal_lahir }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Provinsi Lahir:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->provinsi_lahir }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kota/Kabupaten Lahir:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->kota_kabupaten_lahir }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tempat Lahir Luar Negeri:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->tempat_lahir_luar_negeri ?? 'Tidak ada' }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->jenis_kelamin }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Status Menikah:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->status_menikah }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Agama:</label>
                <p class="mt-1 text-sm text-gray-900">{{ $formulir->agama }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('formulir.index') }}" class="inline-block px-4 text-sm py-2 text-white bg-blue-500 font-bold rounded-md hover:bg-blue-700">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>