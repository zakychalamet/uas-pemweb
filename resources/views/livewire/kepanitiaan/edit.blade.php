<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8 space-y-6 mt-10">
    <h2 class="text-xl font-bold text-gray-800">Edit Data Kepanitiaan</h2>

    <form wire:submit.prevent="update" class="space-y-5">
        <!-- Kegiatan -->
        <div>
            <label for="kegiatan_id" class="block text-sm font-medium text-gray-700 mb-1">Kegiatan</label>
            <select wire:model="kegiatan_id" id="kegiatan_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Kegiatan --</option>
                @foreach ($kegiatans as $kegiatan)
                    <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama }}</option>
                @endforeach
            </select>
            @error('kegiatan_id')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Anggota -->
        <div>
            <label for="anggota_id" class="block text-sm font-medium text-gray-700 mb-1">Anggota</label>
            <select wire:model="anggota_id" id="anggota_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Anggota --</option>
                @foreach ($anggotas as $anggota)
                    <option value="{{ $anggota->id }}">{{ $anggota->nama }} ({{ $anggota->nim }})</option>
                @endforeach
            </select>
            @error('anggota_id')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Jabatan -->
        <div>
            <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
            <input type="text" id="jabatan" wire:model="jabatan"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('jabatan')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                Update
            </button>
            <a href="{{ route('kepanitiaan.index') }}"
               class="text-gray-700 hover:text-red-600 font-medium underline transition">
                Batal
            </a>
        </div>
    </form>
</div>
