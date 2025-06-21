<?php
namespace App\Livewire\Kegiatan;

use App\Models\Kegiatan;
use App\Models\Organisasi;
use App\Models\Lokasi;
use Livewire\Component;

class Create extends Component
{
    public $nama, $tgl_pelaksanaan, $organisasi_id, $lokasi_id;

    public function render()
    {
        return view('livewire.kegiatan.create', [
            'organisasis' => Organisasi::all(),
            'lokasis' => Lokasi::all(),
        ])->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'tgl_pelaksanaan' => 'required|date',
            'organisasi_id' => 'required|exists:organisasi,id',
            'lokasi_id' => 'required|exists:lokasi,id',
        ]);

        Kegiatan::create([
            'nama' => $this->nama,
            'tgl_pelaksanaan' => $this->tgl_pelaksanaan,
            'organisasi_id' => $this->organisasi_id,
            'lokasi_id' => $this->lokasi_id,
        ]);

        session()->flash('message', 'Kegiatan berhasil ditambahkan.');
        return redirect()->route('kegiatan.index');
    }
}
