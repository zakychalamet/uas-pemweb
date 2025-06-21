<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    
    protected $fillable = [
        'nama',
        'nim',
        'organisasi_id'
    ];

    // Relationship: Member belongs to an organization
    public function organisasi(): BelongsTo
    {
        return $this->belongsTo(Organisasi::class);
    }

    // Relationship: Member has many committee assignments
    public function kepanitiaan(): HasMany
    {
        return $this->hasMany(Kepanitiaan::class);
    }
}