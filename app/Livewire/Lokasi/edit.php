<?php
namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Component;

class Edit extends Component
{
    public $lokasiId;
    public $nama_lokasi, $alamat;

    public function mount($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $this->lokasiId = $id;
        $this->nama_lokasi = $lokasi->nama_lokasi;
        $this->alamat = $lokasi->alamat;
    }

    public function render()
    {
        return view('livewire.lokasi.edit')
        ->layout('layouts.app'); 
    }

    public function update()
    {
        $this->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        Lokasi::findOrFail($this->lokasiId)->update([
            'nama_lokasi' => $this->nama_lokasi,
            'alamat' => $this->alamat,
        ]);

        session()->flash('message', 'Lokasi berhasil diperbarui.');
        return redirect()->route('lokasi.index');
    }
}
