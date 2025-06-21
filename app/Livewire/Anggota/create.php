<?php
namespace App\Livewire\Anggota;

use App\Models\Anggota;
use App\Models\Organisasi;
use Livewire\Component;

class Create extends Component
{
    public $nama, $nim, $organisasi_id;

    public function render()
    {
        return view('livewire.anggota.create', [
            'organisasis' => Organisasi::all()
        ])->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'organisasi_id' => 'required|exists:organisasi,id',
        ]);

        Anggota::create([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'organisasi_id' => $this->organisasi_id,
        ]);

        session()->flash('message', 'Anggota berhasil ditambahkan.');
        return redirect()->route('anggota.index');
    }
}
