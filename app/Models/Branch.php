<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'address',
        'phone',
        'email',
        'hours',
        'capacity',
        'services',
        'manager_user_id',
        'status',
    ];

    protected $casts = [
        'hours' => 'array',
        'services' => 'array',
    ];

    /**
     * Get the company that owns the branch.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the manager for the branch.
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_user_id');
    }

    /**
     * Get the users for the branch.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the kids for the branch.
     */
    public function kids(): HasMany
    {
        return $this->hasMany(Kid::class);
    }

    /**
     * Get the medicine administrations for the branch.
     */
    public function medicineAdministrations(): HasMany
    {
        return $this->hasMany(MedicineAdministration::class);
    }

    /**
     * Get the attendance records for the branch.
     */
    public function attendanceRecords(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
