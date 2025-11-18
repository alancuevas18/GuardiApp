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
        'company_id',
        'branch_id',
        'first_name',
        'last_name',
        'birth_date',
        'allergies',
        'medical_notes',
        'emergency_contact',
        'active',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'active' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function medicineAdministrations(): HasMany
    {
        return $this->hasMany(MedicineAdministration::class);
    }

    public function attendance(): MorphMany
    {
        return $this->morphMany(Attendance::class, 'attendable');
    }
}
