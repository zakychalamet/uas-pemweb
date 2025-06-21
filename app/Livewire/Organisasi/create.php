<?php
namespace App\Livewire\Organisasi;

use App\Models\Organisasi;
use Livewire\Component;

class Create extends Component
{
    public $nama_organisasi, $jenis;

    public function render()
    {
        return view('livewire.organisasi.create')
        ->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
        ]);

        Organisasi::create([
            'nama_organisasi' => $this->nama_organisasi,
            'jenis' => $this->jenis,
        ]);

        session()->flash('message', 'Organisasi berhasil ditambahkan.');
        return redirect()->route('organisasi.index');
    }
}
