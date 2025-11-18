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
        'user_id',
        'medicine_name',
        'dose',
        'administered_at',
        'reason',
        'notes',
        'signature_path',
        'branch_id',
    ];

    protected $casts = [
        'administered_at' => 'datetime',
    ];

    /**
     * Get the kid that owns the medicine administration.
     */
    public function kid(): BelongsTo
    {
        return $this->belongsTo(Kid::class);
    }

    /**
     * Get the user that administered the medicine.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the branch that owns the medicine administration.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
