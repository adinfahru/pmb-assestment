<x-app-layout>
    <x-slot name="header">
        {{ __('Manage Formulir Mahasiswa') }}
    </x-slot>

    <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
        <div class="overflow-x-auto w-full">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">Tanggal Pendaftaran</th>
                        <th class="px-4 py-3">Nama Lengkap</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Approval</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach($formulirs as $formulir)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $formulir->created_at }}</td>
                        <td class="px-4 py-3 text-sm">{{ $formulir->nama_lengkap }}</td>
                        <td class="px-4 py-3 text-sm capitalize rounded-sm font-bold
                            {{ $formulir->status == 'pending' || $formulir->status == 'ditolak' ? 'bg-red-500' : 'bg-green-500' }} text-white">
                            {{ $formulir->status }}
                        </td>
                        <td class="px-4 py-2">
                            @if($formulir->status == 'pending')
                            <form action="{{ route('formulir.approve', $formulir->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="px-4 py-2 text-white text-sm bg-blue-500 font-bold rounded-md hover:bg-blue-700">
                                    Terima
                                </button>
                            </form>
                            <form action="{{ route('formulir.reject', $formulir->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="px-4 py-2 text-white text-sm bg-red-500 font-bold rounded-md hover:bg-red-700">
                                    Tolak
                                </button>
                            </form>
                            @endif
                            <a href="{{ route('formulir.show', $formulir->id) }}" class="px-4 py-2 text-white text-sm bg-gray-500 font-bold rounded-md hover:bg-gray-700">
                                Lihat
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('formulir.edit', $formulir->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>