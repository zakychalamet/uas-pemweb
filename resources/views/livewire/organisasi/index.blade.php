<div class="min-h-screen bg-gradient-to-br from-gray-100 via-white to-gray-50 py-10 px-4 md:px-8 space-y-6">
    <!-- Tombol Tambah -->
    <div class="flex justify-end">
        <a href="{{ route('organisasi.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-5 py-2 rounded-lg shadow-lg transition duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Organisasi
        </a>
    </div>

    <!-- Notifikasi Sukses -->
    @if (session()->has('message'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-lg shadow-md flex items-center space-x-2">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <!-- Tabel Organisasi -->
    <div class="bg-white rounded-2xl shadow-lg overflow-x-auto">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-blue-100 text-gray-800 text-left uppercase tracking-wider text-xs">
                <tr>
                    <th class="px-6 py-4 font-semibold">Nama Organisasi</th>
                    <th class="px-6 py-4 font-semibold">Jenis</th>
                    <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($organisasis as $org)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $org->nama_organisasi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $org->jenis }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('organisasi.edit', $org->id) }}"
                                   class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-black text-xs font-semibold rounded-lg shadow transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9" />
                                        <path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4 12.5-12.5z" />
                                    </svg>
                                    Edit
                                </a>
                                <button wire:click="delete({{ $org->id }})"
                                        onclick="confirm('Yakin ingin menghapus?') || event.stopImmediatePropagation()"
                                        class="inline-flex items-center gap-1 px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs font-semibold rounded-lg shadow transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m4-3h2a1 1 0 011 1v1H8V5a1 1 0 011-1z"/>
                                    </svg>
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500 italic">Belum ada data organisasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $organisasis->links() }}
    </div>
</div>
