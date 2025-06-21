<?php
namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Component;

class Create extends Component
{
    public $nama_lokasi, $alamat;

    public function render()
    {
        return view('livewire.lokasi.create')
            ->layout('layouts.app'); 
    }

    public function store()
    {
        $this->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        Lokasi::create([
            'nama_lokasi' => $this->nama_lokasi,
            'alamat' => $this->alamat,
        ]);

        session()->flash('message', 'Lokasi berhasil ditambahkan.');
        return redirect()->route('lokasi.index');
    }
}
