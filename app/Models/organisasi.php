<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasi';
    
    protected $fillable = [
        'nama_organisasi',
        'jenis'
    ];

    // Relationship: Organization has many activities
    public function kegiatan(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }

    // Relationship: Organization has many members
    public function anggota(): HasMany
    {
        return $this->hasMany(Anggota::class);
    }
}