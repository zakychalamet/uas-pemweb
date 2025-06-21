<?php

namespace App\Livewire\Kegiatan;

use App\Models\Kegiatan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['refreshKegiatan' => '$refresh'];

    public function render()
{
    return view('livewire.kegiatan.index', [
        'kegiatans' => Kegiatan::with(['organisasi', 'lokasi'])
            ->where('nama', 'like', '%'.$this->search.'%')
            ->paginate(10),
    ])->layout('layouts.app'); // Tambahkan ini untuk gunakan layout yang benar
}

    public function delete($id)
    {
        Kegiatan::findOrFail($id)->delete();
        session()->flash('message', 'Kegiatan berhasil dihapus.');
    }
}

