<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    
    protected $fillable = [
        'nama',
        'tgl_pelaksanaan',
        'organisasi_id',
        'lokasi_id'
    ];

    protected $casts = [
        'tgl_pelaksanaan' => 'date'
    ];

    // Relationship: Activity belongs to an organization
    public function organisasi(): BelongsTo
    {
        return $this->belongsTo(Organisasi::class);
    }

    // Relationship: Activity belongs to a location
    public function lokasi(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class);
    }

    // Relationship: Activity has many committee assignments
    public function kepanitiaan(): HasMany
    {
        return $this->hasMany(Kepanitiaan::class);
    }
}