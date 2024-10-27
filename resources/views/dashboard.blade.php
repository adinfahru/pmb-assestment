<x-guest-layout>
    <div class="p-8 bg-white rounded-lg shadow-lg border border-gray-300">
        <div class="flex items-center space-x-5">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8 text-yellow-400 flex-shrink-0"
                fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13 16h-1v-4h-1m-2 8h8m4-12l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            <h1 class="text-2xl font-bold tracking-wide text-gray-900">
                @if(auth()->user()->role === 'mahasiswa')
                {{ __('Akun Anda Sudah Aktif') }}
                @else
                {{ __('Akun Anda Belum Aktif Saat Ini') }}
                @endif
            </h1>
        </div>
        <p class="mt-3 text-base leading-relaxed text-gray-700">
            @if(auth()->user()->role === 'mahasiswa')
            Selamat! Anda telah terdaftar sebagai calon mahasiswa.
            Anda sekarang dapat mengisi formulir pendaftaran.
            @else
            Mohon menunggu, Admin sedang memverifikasi akun anda. 
            Hubungi tim admin untuk bantuan lebih lanjut.
            @endif
        </p>
        <div class="mt-5">
            @if(auth()->user()->role === 'mahasiswa')
            <a href="{{ route('mahasiswa.dashboard') }}"
                class="inline-block px-6 py-3 text-center bg-blue-600 
                          text-white text-sm font-semibold rounded-lg 
                          shadow-md hover:bg-blue-700 hover:shadow-lg 
                          focus:outline-none focus:ring-2 focus:ring-blue-400 
                          focus:ring-opacity-75 transition-all duration-300">
                Masuk ke Dashboard Mahasiswa
            </a>
            @else
            <a href="/"
                class="inline-block px-6 py-3 text-center bg-blue-600 
                          text-white text-sm font-semibold rounded-lg 
                          shadow-md hover:bg-blue-700 hover:shadow-lg 
                          focus:outline-none focus:ring-2 focus:ring-blue-400 
                          focus:ring-opacity-75 transition-all duration-300">
                Kembali ke Beranda
            </a>
            @endif
        </div>
    </div>
</x-guest-layout>