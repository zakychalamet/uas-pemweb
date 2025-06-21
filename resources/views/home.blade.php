<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-5">
                <h4 class="text-lg font-bold mb-2">Daftar Organisasi</h4>
                @livewire('organisasi.index')
            </div>

            <div class="mb-5">
                <h4 class="text-lg font-bold mb-2">Daftar Kegiatan</h4>
                @livewire('kegiatan.index')
            </div>

            <div class="mb-5">
                <h4 class="text-lg font-bold mb-2">Daftar Anggota</h4>
                @livewire('anggota.index')
            </div>

            <div class="mb-5">
                <h4 class="text-lg font-bold mb-2">Daftar Kepanitiaan</h4>
                @livewire('kepanitiaan.index')
            </div>

        </div>
    </div>
</x-app-layout>
