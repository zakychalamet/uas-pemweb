<?php
namespace App\Livewire\Organisasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Organisasi;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        Organisasi::findOrFail($id)->delete();
        session()->flash('message', 'Organisasi berhasil dihapus.');
    }

    public function render()
    {
    $organisasis = Organisasi::where('nama_organisasi', 'like', '%'.$this->search.'%')->paginate(10);

    return view('livewire.organisasi.index', compact('organisasis'))
        ->layout('layouts.app');
    }
}
