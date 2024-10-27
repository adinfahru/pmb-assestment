<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Mahasiswa') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <h2 class="text-lg font-semibold">Selamat datang, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-600">Anda sekarang dapat mengakses formulir pendaftaran dan melanjutkan proses pendaftaran Anda.</p>
    </div>
</x-app-layout>
