<?php
namespace App\Livewire\Anggota;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Anggota;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        Anggota::findOrFail($id)->delete();
        session()->flash('message', 'Anggota berhasil dihapus.');
    }

    public function render()
    {
    $anggotas = Anggota::with('organisasi')
        ->where('nama', 'like', '%' . $this->search . '%')
        ->paginate(10);

    return view('livewire.anggota.index', compact('anggotas'))
        ->layout('layouts.app');
    }
}
