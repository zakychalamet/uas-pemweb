<?php

namespace App\Livewire\Laporan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kegiatan;
use App\Models\Organisasi;
use App\Models\Lokasi;

class Index extends Component
{
    use WithPagination;

    public $organisasi_id = '';
    public $lokasi_id = '';

    public function updated($property)
    {
        // Reset ke halaman pertama saat filter berubah
        $this->resetPage();
    }

    public function render()
    {
        $query = Kegiatan::with(['organisasi', 'lokasi'])
            ->withCount('kepanitiaan');

        if ($this->organisasi_id) {
            $query->where('organisasi_id', $this->organisasi_id);
        }

        if ($this->lokasi_id) {
            $query->where('lokasi_id', $this->lokasi_id);
        }

        return view('livewire.laporan.index', [
            'kegiatans' => $query->paginate(10), // gunakan paginate agar WithPagination aktif
            'organisasis' => Organisasi::all(),
            'lokasis' => Lokasi::all(),
        ])->layout('layouts.app');
    }
}
