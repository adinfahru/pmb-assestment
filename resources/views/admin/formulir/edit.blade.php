<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Formulir Mahasiswa') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('formulir.update', $form->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $form->nama_lengkap) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('nama_lengkap')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat_ktp" class="block text-sm font-medium text-gray-700">Alamat KTP</label>
                <input type="text" name="alamat_ktp" id="alamat_ktp" value="{{ old('alamat_ktp', $form->alamat_ktp) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('alamat_ktp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat_saat_ini" class="block text-sm font-medium text-gray-700">Alamat Saat Ini</label>
                <input type="text" name="alamat_saat_ini" id="alamat_saat_ini" value="{{ old('alamat_saat_ini', $form->alamat_saat_ini) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('alamat_saat_ini')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                <select name="provinsi" id="provinsi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="">Pilih Provinsi</option>
                    @foreach($provinces as $province)
                    <option value="{{ $province->code }}" {{ $province->code == old('provinsi', $form->provinsi) ? 'selected' : '' }}>
                        {{ $province->name }}
                    </option>
                    @endforeach
                </select>
                @error('provinsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kota_kabupaten" class="block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                <select name="kota_kabupaten" id="kota_kabupaten" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="">Pilih Kota/Kabupaten</option>
                    <!-- Tambahkan logika untuk memuat kota berdasarkan provinsi yang dipilih -->
                    @foreach($cities as $city)
                    <option value="{{ $city->code }}" {{ $city->code == old('kota_kabupaten', $form->kota_kabupaten) ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                    @endforeach
                </select>
                @error('kota_kabupaten')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="number" name="telepon" id="telepon" value="{{ old('telepon', $form->telepon) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('telepon')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="hp" class="block text-sm font-medium text-gray-700">Handphone</label>
                <input type="number" name="hp" id="hp" value="{{ old('hp', $form->hp) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('hp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $form->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kewarganegaraan" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="{{ old('kewarganegaraan', $form->kewarganegaraan) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('kewarganegaraan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $form->tanggal_lahir) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('tanggal_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="provinsi_lahir" class="block text-sm font-medium text-gray-700">Provinsi Lahir</label>
                <input type="text" name="provinsi_lahir" id="provinsi_lahir" value="{{ old('provinsi_lahir', $form->provinsi_lahir) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('provinsi_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kota_kabupaten_lahir" class="block text-sm font-medium text-gray-700">Kota/Kabupaten Lahir</label>
                <input type="text" name="kota_kabupaten_lahir" id="kota_kabupaten_lahir" value="{{ old('kota_kabupaten_lahir', $form->kota_kabupaten_lahir) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                @error('kota_kabupaten_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tempat_lahir_luar_negeri" class="block text-sm font-medium text-gray-700">Tempat Lahir Luar Negeri</label>
                <input type="text" name="tempat_lahir_luar_negeri" id="tempat_lahir_luar_negeri" value="{{ old('tempat_lahir_luar_negeri', $form->tempat_lahir_luar_negeri) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('tempat_lahir_luar_negeri')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $form->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $form->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                <select name="agama" id="agama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="" disabled selected>Pilih Agama</option>
                    <option value="Islam" {{ old('agama', $form->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama', $form->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama', $form->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama', $form->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama', $form->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama', $form->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    <option value="Lainnya" {{ old('agama', $form->agama) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('agama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status_menikah" class="block text-sm font-medium text-gray-700">Status Menikah</label>
                <select name="status_menikah" id="status_menikah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="Belum Menikah" {{ old('status_menikah', $form->status_menikah) == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Menikah" {{ old('status_menikah', $form->status_menikah) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Lainnya" {{ old('status_menikah', $form->status_menikah) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('status_menikah')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 font-bold rounded-md hover:bg-blue-700">
                    Perbarui Formulir
                </button>
            </div>
        </form>
    </div>
</x-app-layout>