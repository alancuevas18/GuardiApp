<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicineAdministration extends Model
{
    use HasFactory;

    protected $fillable = [
        'kid_id',
        'administered_by',
        'medicine_name',
        'dosage',
        'administered_at',
        'notes',
    ];

    protected $casts = [
        'administered_at' => 'datetime',
    ];

    public function kid(): BelongsTo
    {
        return $this->belongsTo(Kid::class);
    }

    public function administeredBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'administered_by');
    }
}
