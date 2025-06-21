<?php
namespace App\Livewire\Kepanitiaan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kepanitiaan;

class Index extends Component
{
    use WithPagination;

    public function delete($id)
    {
        Kepanitiaan::findOrFail($id)->delete();
        session()->flash('message', 'Data kepanitiaan berhasil dihapus.');
    }

    public function render()
    {
        $data = Kepanitiaan::with('kegiatan', 'anggota.organisasi')->paginate(10);
        return view('livewire.kepanitiaan.index', compact('data'))
            ->layout('layouts.app');
    }
}
