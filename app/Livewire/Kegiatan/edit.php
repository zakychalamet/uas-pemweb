<?php
namespace App\Livewire\Kegiatan;

use App\Models\Kegiatan;
use App\Models\Organisasi;
use App\Models\Lokasi;
use Livewire\Component;

class Edit extends Component
{
    public $kegiatanId;
    public $nama, $tgl_pelaksanaan, $organisasi_id, $lokasi_id;

    public function mount($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $this->kegiatanId = $id;
        $this->nama = $kegiatan->nama;
        $this->tgl_pelaksanaan = $kegiatan->tgl_pelaksanaan;
        $this->organisasi_id = $kegiatan->organisasi_id;
        $this->lokasi_id = $kegiatan->lokasi_id;
    }

    public function render()
    {
        return view('livewire.kegiatan.edit', [
            'organisasis' => Organisasi::all(),
            'lokasis' => Lokasi::all(),
        ])->layout('layouts.app');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'tgl_pelaksanaan' => 'required|date',
            'organisasi_id' => 'required|exists:organisasi,id',
            'lokasi_id' => 'required|exists:lokasi,id',
        ]);

        $kegiatan = Kegiatan::findOrFail($this->kegiatanId);
        $kegiatan->update([
            'nama' => $this->nama,
            'tgl_pelaksanaan' => $this->tgl_pelaksanaan,
            'organisasi_id' => $this->organisasi_id,
            'lokasi_id' => $this->lokasi_id,
        ]);

        session()->flash('message', 'Kegiatan berhasil diubah.');
        return redirect()->route('kegiatan.index');
    }
}
