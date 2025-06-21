<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8 space-y-6 mt-10">
    <h2 class="text-xl font-bold text-gray-800">Tambah Data Kepanitiaan</h2>

    <form wire:submit.prevent="store" class="space-y-5">
        <!-- Kegiatan -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kegiatan</label>
            <select wire:model="kegiatan_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih --</option>
                @foreach ($kegiatans as $keg)
                    <option value="{{ $keg->id }}">{{ $keg->nama }}</option>
                @endforeach
            </select>
            @error('kegiatan_id')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Anggota -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Anggota</label>
            <select wire:model="anggota_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih --</option>
                @foreach ($anggotas as $ang)
                    <option value="{{ $ang->id }}">{{ $ang->nama }} - {{ $ang->organisasi->nama_organisasi }}</option>
                @endforeach
            </select>
            @error('anggota_id')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Jabatan -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
            <input type="text" wire:model="jabatan"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('jabatan')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Tombol -->
        <div class="flex justify-between pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                Simpan
            </button>
            <a href="{{ route('kepanitiaan.index') }}"
               class="text-gray-700 hover:text-red-600 font-medium underline transition">
                Batal
            </a>
        </div>
    </form>
</div>
