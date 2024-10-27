<x-app-layout>
    <x-slot name="header">
        {{ __('Pengisian Formulir Mahasiswa') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('formulir-mahasiswa.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('nama_lengkap')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat_ktp" class="block text-sm font-medium text-gray-700">Alamat KTP</label>
                <textarea name="alamat_ktp" id="alamat_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>{{ old('alamat_ktp') }}</textarea>
                @error('alamat_ktp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat_saat_ini" class="block text-sm font-medium text-gray-700">Alamat Saat Ini</label>
                <textarea name="alamat_saat_ini" id="alamat_saat_ini" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>{{ old('alamat_saat_ini') }}</textarea>
                @error('alamat_saat_ini')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                <input type="text" name="provinsi" id="provinsi" value="{{ old('provinsi') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('provinsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kota_kabupaten" class="block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                <input type="text" name="kota_kabupaten" id="kota_kabupaten" value="{{ old('kota_kabupaten') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('kota_kabupaten')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('kecamatan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="number" name="telepon" id="telepon" value="{{ old('telepon') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('telepon')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="hp" class="block text-sm font-medium text-gray-700">HP</label>
                <input type="number" name="hp" id="hp" value="{{ old('hp') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('hp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kewarganegaraan" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="{{ old('kewarganegaraan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('kewarganegaraan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('tanggal_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="provinsi_lahir" class="block text-sm font-medium text-gray-700">Provinsi Lahir</label>
                <input type="text" name="provinsi_lahir" id="provinsi_lahir" value="{{ old('provinsi_lahir') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('provinsi_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kota_kabupaten_lahir" class="block text-sm font-medium text-gray-700">Kota/Kabupaten Lahir</label>
                <input type="text" name="kota_kabupaten_lahir" id="kota_kabupaten_lahir" value="{{ old('kota_kabupaten_lahir') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('kota_kabupaten_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tempat_lahir_luar_negeri" class="block text-sm font-medium text-gray-700">Tempat Lahir (Luar Negeri)</label>
                <input type="text" name="tempat_lahir_luar_negeri" id="tempat_lahir_luar_negeri" value="{{ old('tempat_lahir_luar_negeri') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('tempat_lahir_luar_negeri')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                <select name="agama" id="agama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="" disabled selected>Pilih Agama</option>
                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    <option value="Lainnya" {{ old('agama') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('agama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status_menikah" class="block text-sm font-medium text-gray-700">Status Menikah</label>
                <select name="status_menikah" id="status_menikah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="Belum Menikah" {{ old('status_menikah') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Menikah" {{ old('status_menikah') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Duda/Janda" {{ old('status_menikah') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('status_menikah')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Add more form fields as needed for other data -->

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>