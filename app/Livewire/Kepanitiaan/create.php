<?php
namespace App\Livewire\Kepanitiaan;

use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Kepanitiaan;
use Livewire\Component;

class Create extends Component
{
    public $kegiatan_id, $anggota_id, $jabatan;

    public function render()
    {
        return view('livewire.kepanitiaan.create', [
            'kegiatans' => Kegiatan::all(),
            'anggotas' => Anggota::with('organisasi')->get(),
        ])->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'anggota_id' => 'required|exists:anggota,id',
            'jabatan' => 'required|string|max:100',
        ]);

        Kepanitiaan::create([
            'kegiatan_id' => $this->kegiatan_id,
            'anggota_id' => $this->anggota_id,
            'jabatan' => $this->jabatan,
        ]);

        session()->flash('message', 'Data kepanitiaan berhasil ditambahkan.');
        return redirect()->route('kepanitiaan.index');
    }
}
