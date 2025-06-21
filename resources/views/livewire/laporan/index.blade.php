<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-10 px-4 md:px-8 space-y-8">

    <!-- Judul -->
    <div>
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Laporan Kegiatan & Panitia</h1>
        <p class="text-sm text-gray-500 mt-1">Data kegiatan beserta jumlah kepanitiaannya</p>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-2xl shadow p-6 space-y-6">
        <h2 class="text-lg font-semibold text-gray-700">Filter Data</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Filter Organisasi -->
            <div>
                <label for="organisasi" class="block text-sm font-medium text-gray-700 mb-1">Organisasi</label>
                <select id="organisasi" wire:model.lazy="organisasi_id"
                        class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Semua Organisasi</option>
                    @foreach ($organisasis as $org)
                        <option value="{{ $org->id }}">{{ $org->nama_organisasi }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Lokasi -->
            <div>
                <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                <select id="lokasi" wire:model.lazy="lokasi_id"
                        class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Semua Lokasi</option>
                    @foreach ($lokasis as $lok)
                        <option value="{{ $lok->id }}">{{ $lok->nama_lokasi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Jumlah Kegiatan -->
        <div class="bg-blue-100 border border-blue-300 rounded-2xl p-6 shadow flex items-center gap-4">
            <div class="p-3 bg-blue-500 text-white rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                </svg>
            </div>
            <div>
                <div class="text-2xl font-bold text-blue-900">
                    {{ $kegiatans->count() }}
                </div>
                <div class="text-sm text-blue-700">Jumlah Kegiatan</div>
            </div>
        </div>

        <!-- Jumlah Anggota Panitia -->
        <div class="bg-green-100 border border-green-300 rounded-2xl p-6 shadow flex items-center gap-4">
            <div class="p-3 bg-green-500 text-white rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m3 6v-4m0-4a4 4 0 100-8 4 4 0 000 8z"/>
                </svg>
            </div>
            <div>
                <div class="text-2xl font-bold text-green-900">
                    {{ $kegiatans->sum('kepanitiaan_count') }}
                </div>
                <div class="text-sm text-green-700">Jumlah Anggota Panitia</div>
            </div>
        </div>
    </div>

    <!-- Tabel Kegiatan -->
    <div class="bg-white rounded-2xl shadow-lg overflow-x-auto">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-blue-100 text-gray-800 uppercase tracking-wider text-xs">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">Nama</th>
                    <th class="px-6 py-4 text-left font-semibold">Organisasi</th>
                    <th class="px-6 py-4 text-left font-semibold">Lokasi</th>
                    <th class="px-6 py-4 text-left font-semibold">Jumlah Panitia</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($kegiatans as $kegiatan)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $kegiatan->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $kegiatan->organisasi->nama_organisasi ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $kegiatan->lokasi->nama_lokasi ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $kegiatan->kepanitiaan_count }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 italic">Tidak ada data kegiatan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $kegiatans->links() }}
    </div>
</div>
