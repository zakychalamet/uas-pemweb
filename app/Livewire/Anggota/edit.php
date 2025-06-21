<?php
namespace App\Livewire\Anggota;

use App\Models\Anggota;
use App\Models\Organisasi;
use Livewire\Component;

class Edit extends Component
{
    public $anggotaId;
    public $nama, $nim, $organisasi_id;

    public function mount($id)
    {
        $anggota = Anggota::findOrFail($id);
        $this->anggotaId = $id;
        $this->nama = $anggota->nama;
        $this->nim = $anggota->nim;
        $this->organisasi_id = $anggota->organisasi_id;
    }

    public function render()
    {
        return view('livewire.anggota.edit', [
            'organisasis' => Organisasi::all()
        ])->layout('layouts.app');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'organisasi_id' => 'required|exists:organisasi,id',
        ]);

        Anggota::findOrFail($this->anggotaId)->update([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'organisasi_id' => $this->organisasi_id,
        ]);

        session()->flash('message', 'Anggota berhasil diperbarui.');
        return redirect()->route('anggota.index');
    }
}
