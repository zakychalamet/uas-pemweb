<div class="max-w-xl mx-auto mt-10 bg-white rounded-xl shadow-md p-8 space-y-6">
    <h2 class="text-xl font-semibold text-gray-800">Tambah Organisasi</h2>

    <form wire:submit.prevent="store" class="space-y-5">
        <!-- Nama Organisasi -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Organisasi</label>
            <input type="text" wire:model="nama_organisasi"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('nama_organisasi')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Jenis -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis</label>
            <input type="text" wire:model="jenis"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('jenis')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Tombol -->
        <div class="flex justify-between pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                Simpan
            </button>
            <a href="{{ route('organisasi.index') }}"
               class="text-gray-700 hover:text-red-600 font-medium underline transition">
                Batal
            </a>
        </div>
    </form>
</div>
