<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-700 leading-tight">
            {{ __('EVORG - Event Organizer') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto px-4 space-y-6">
            @php
                $cards = [
                    [
                        'route' => 'organisasi.index',
                        'title' => 'Organisasi',
                        'desc' => 'Kelola data organisasi',
                        'color' => 'bg-indigo-100',
                        'icon' => 'building-office'
                    ],
                    [
                        'route' => 'lokasi.index',
                        'title' => 'Lokasi',
                        'desc' => 'Data lokasi kegiatan',
                        'color' => 'bg-green-100',
                        'icon' => 'map-pin'
                    ],
                    [
                        'route' => 'kegiatan.index',
                        'title' => 'Kegiatan',
                        'desc' => 'Lihat & tambah kegiatan',
                        'color' => 'bg-yellow-100',
                        'icon' => 'calendar-days'
                    ],
                    [
                        'route' => 'anggota.index',
                        'title' => 'Anggota',
                        'desc' => 'Manajemen anggota organisasi',
                        'color' => 'bg-pink-100',
                        'icon' => 'users'
                    ],
                    [
                        'route' => 'kepanitiaan.index',
                        'title' => 'Kepanitiaan',
                        'desc' => 'Struktur dan peran panitia',
                        'color' => 'bg-blue-100',
                        'icon' => 'clipboard-document-list'
                    ],
                    [
                        'route' => 'laporan.index',
                        'title' => 'Laporan',
                        'desc' => 'Daftar kegiatan & jumlah panitia',
                        'color' => 'bg-purple-100',
                        'icon' => 'chart-bar'
                    ],
                ];
            @endphp

            @foreach ($cards as $card)
                <a href="{{ route($card['route']) }}"
                   class="flex items-center justify-between rounded-xl shadow hover:shadow-lg p-6 border border-gray-200 {{ $card['color'] }} transition">
                    <div class="flex items-center space-x-4">
                        {{-- Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <use xlink:href="#icon-{{ $card['icon'] }}" />
                        </svg>
                        <div>
                            <div class="text-lg font-semibold text-gray-800">{{ $card['title'] }}</div>
                            <div class="mt-1 text-sm text-gray-600">{{ $card['desc'] }}</div>
                        </div>
                    </div>
                    <div class="text-indigo-600 font-medium text-sm">Lihat →</div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- SVG Icon Definitions --}}
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="icon-building-office" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M3 21h18M9 8h.01M9 12h.01M9 16h.01M15 8h.01M15 12h.01M15 16h.01M4 21V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v16" />
        </symbol>
        <symbol id="icon-map-pin" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M12 21c4.5-4.5 6-7.5 6-10.5a6 6 0 1 0-12 0c0 3 1.5 6 6 10.5zM12 12a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
        </symbol>
        <symbol id="icon-calendar-days" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M8 7V3M16 7V3M3 10h18M5 6h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z" />
        </symbol>
        <symbol id="icon-users" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M17 20v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2M12 12a4 4 0 1 0-8 0 4 4 0 0 0 8 0zm6-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm2 11v-1a4 4 0 0 0-3-3.87" />
        </symbol>
        <symbol id="icon-clipboard-document-list" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M9 12h6m-6 4h6M9 8h6m-9 12h12a2 2 0 0 0 2-2V7.5a1.5 1.5 0 0 0-1.5-1.5H16l-.867-1.732A1 1 0 0 0 14.267 4H9.733a1 1 0 0 0-.866.5L8 6H5.5A1.5 1.5 0 0 0 4 7.5V18a2 2 0 0 0 2 2z" />
        </symbol>
        <symbol id="icon-chart-bar" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M3 3v18h18M9 17V9M13 17V5M17 17v-8" />
        </symbol>
    </svg>
</x-app-layout>
