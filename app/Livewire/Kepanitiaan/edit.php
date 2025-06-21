<?php
namespace App\Livewire\Kepanitiaan;

use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Kepanitiaan;
use Livewire\Component;

class Edit extends Component
{
    public $idKepanitiaan;
    public $kegiatan_id, $anggota_id, $jabatan;

    public function mount($id)
    {
        $data = Kepanitiaan::findOrFail($id);
        $this->idKepanitiaan = $id;
        $this->kegiatan_id = $data->kegiatan_id;
        $this->anggota_id = $data->anggota_id;
        $this->jabatan = $data->jabatan;
    }

    public function render()
    {
        return view('livewire.kepanitiaan.edit', [
            'kegiatans' => Kegiatan::all(),
            'anggotas' => Anggota::with('organisasi')->get(),
        ])->layout('layouts.app');
    }

    public function update()
    {
        $this->validate([
            'kegiatan_id' => 'required',
            'anggota_id' => 'required',
            'jabatan' => 'required|string|max:100',
        ]);

        Kepanitiaan::findOrFail($this->idKepanitiaan)->update([
            'kegiatan_id' => $this->kegiatan_id,
            'anggota_id' => $this->anggota_id,
            'jabatan' => $this->jabatan,
        ]);

        session()->flash('message', 'Data kepanitiaan berhasil diperbarui.');
        return redirect()->route('kepanitiaan.index');
    }
}
