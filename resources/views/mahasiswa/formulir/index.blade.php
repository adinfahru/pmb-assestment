<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-indigo-900">Formulir Pendaftaran Mahasiswa Baru</h1>

        @if($formulirs->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="mb-4 text-gray-600">Anda belum mengisi formulir pendaftaran.</p>
            <a href="{{ route('formulir-mahasiswa.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Isi Formulir Pendaftaran
            </a>
        </div>
        @else
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">Tanggal Pendaftaran</th>
                            <th class="px-4 py-3">Nama Lengkap</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($formulirs as $formulir)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ $formulir->created_at }}</td>
                            <td class="px-4 py-3 text-sm">{{ $formulir->nama_lengkap }}</td>
                            <td class="px-4 py-3 text-sm capitalize">{{ $formulir->status }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('formulir-mahasiswa.edit', $formulir->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
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

        @endif
    </div>
</x-app-layout>