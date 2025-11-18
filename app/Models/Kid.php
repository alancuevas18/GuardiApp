<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kid extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'photo_path',
        'address',
        'emergency_contacts',
        'medical_info',
        'allergies',
        'notes',
        'branch_id',
    ];

    protected $casts = [
        'dob' => 'date',
        'emergency_contacts' => 'array',
        'medical_info' => 'array',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the branch that owns the kid.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get the medicine administrations for the kid.
     */
    public function medicineAdministrations(): HasMany
    {
        return $this->hasMany(MedicineAdministration::class);
    }

    /**
     * Get all of the kid's attendance records.
     */
    public function attendance(): MorphMany
    {
        return $this->morphMany(Attendance::class, 'attendable');
    }
}
