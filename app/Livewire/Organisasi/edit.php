<?php
namespace App\Livewire\Organisasi;

use Livewire\Component;
use App\Models\Organisasi;

class Edit extends Component
{
    public $organisasiId;
    public $nama_organisasi, $jenis;

    public function mount($id)
    {
        $org = Organisasi::findOrFail($id);
        $this->organisasiId = $id;
        $this->nama_organisasi = $org->nama_organisasi;
        $this->jenis = $org->jenis;
    }

    public function render()
    {
        return view('livewire.organisasi.edit')
        ->layout('layouts.app');
    }

    public function update()
    {
        $this->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
        ]);

        Organisasi::findOrFail($this->organisasiId)->update([
            'nama_organisasi' => $this->nama_organisasi,
            'jenis' => $this->jenis,
        ]);

        session()->flash('message', 'Organisasi berhasil diperbarui.');
        return redirect()->route('organisasi.index');
    }
}
