<div class="max-w-xl mx-auto mt-10 bg-white rounded-xl shadow-lg p-8 space-y-6">
    <h2 class="text-xl font-bold text-gray-800">Tambah Lokasi</h2>

    <form wire:submit.prevent="store" class="space-y-5">
        <!-- Nama Lokasi -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lokasi</label>
            <input type="text" wire:model="nama_lokasi"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('nama_lokasi')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Alamat -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <textarea wire:model="alamat"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                      rows="4"></textarea>
            @error('alamat')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Tombol -->
        <div class="flex justify-between pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                Simpan
            </button>
            <a href="{{ route('lokasi.index') }}"
               class="text-gray-700 hover:text-red-600 font-medium underline transition">
                Batal
            </a>
        </div>
    </form>
</div>
