<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    
    protected $fillable = [
        'nama_lokasi',
        'alamat'
    ];

    // Relationship: Location has many activities
    public function kegiatan(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }
}