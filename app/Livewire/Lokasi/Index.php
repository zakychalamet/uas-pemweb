<?php
namespace App\Livewire\Lokasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Lokasi;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        Lokasi::findOrFail($id)->delete();
        session()->flash('message', 'Lokasi berhasil dihapus.');
    }

    public function render()
    {
        $lokasis = Lokasi::where('nama_lokasi', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.lokasi.index', compact('lokasis'))
        ->layout('layouts.app');
    }
}
