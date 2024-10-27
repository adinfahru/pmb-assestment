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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>