<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kepanitiaan extends Model
{
    use HasFactory;

    protected $table = 'kepanitiaan';
    
    protected $fillable = [
        'kegiatan_id',
        'anggota_id',
        'jabatan'
    ];

    // Relationship: Committee assignment belongs to an activity
    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class);
    }

    // Relationship: Committee assignment belongs to a member
    public function anggota(): BelongsTo
    {
        return $this->belongsTo(Anggota::class);
    }
}