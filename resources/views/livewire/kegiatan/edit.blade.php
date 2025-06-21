<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8 space-y-6 mt-10">
    <h2 class="text-xl font-bold text-gray-800">Edit Data Kegiatan</h2>

    <form wire:submit.prevent="update" class="space-y-5">
        <!-- Nama Kegiatan -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Kegiatan</label>
            <input type="text" id="nama" wire:model="nama"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('nama')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Tanggal Pelaksanaan -->
        <div>
            <label for="tgl_pelaksanaan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pelaksanaan</label>
            <input type="date" id="tgl_pelaksanaan" wire:model="tgl_pelaksanaan"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('tgl_pelaksanaan')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Organisasi -->
        <div>
            <label for="organisasi_id" class="block text-sm font-medium text-gray-700 mb-1">Organisasi</label>
            <select wire:model="organisasi_id" id="organisasi_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Organisasi --</option>
                @foreach ($organisasis as $org)
                    <option value="{{ $org->id }}">{{ $org->nama_organisasi }}</option>
                @endforeach
            </select>
            @error('organisasi_id')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Lokasi -->
        <div>
            <label for="lokasi_id" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
            <select wire:model="lokasi_id" id="lokasi_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($lokasis as $lok)
                    <option value="{{ $lok->id }}">{{ $lok->nama_lokasi }}</option>
                @endforeach
            </select>
            @error('lokasi_id')
                <small class="text-red-600 text-sm">{{ $message }}</small>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                Update
            </button>
            <a href="{{ route('kegiatan.index') }}"
               class="text-gray-700 hover:text-red-600 font-medium underline transition">
                Batal
            </a>
        </div>
    </form>
</div>
