<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow space-y-6">
    <h4 class="text-xl font-semibold text-gray-800 border-b pb-2">Edit Anggota</h4>

    <form wire:submit.prevent="update" class="space-y-5">
        <!-- Nama -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" id="nama" wire:model="nama" placeholder="Masukkan nama lengkap"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            @error('nama')
                <small class="text-red-600 mt-1 block">{{ $message }}</small>
            @enderror
        </div>

        <!-- NIM -->
        <div>
            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
            <input type="text" id="nim" wire:model="nim" placeholder="Masukkan NIM"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            @error('nim')
                <small class="text-red-600 mt-1 block">{{ $message }}</small>
            @enderror
        </div>

        <!-- Organisasi -->
        <div>
            <label for="organisasi" class="block text-sm font-medium text-gray-700 mb-1">Organisasi</label>
            <select id="organisasi" wire:model="organisasi_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                <option value="">-- Pilih Organisasi --</option>
                @foreach ($organisasis as $org)
                    <option value="{{ $org->id }}">{{ $org->nama_organisasi }}</option>
                @endforeach
            </select>
            @error('organisasi_id')
                <small class="text-red-600 mt-1 block">{{ $message }}</small>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-start gap-3 pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-5 py-2 rounded-lg shadow transition">
                Update
            </button>
            <a href="{{ route('anggota.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold text-sm px-5 py-2 rounded-lg shadow transition">
                Batal
            </a>
        </div>
    </form>
</div>
