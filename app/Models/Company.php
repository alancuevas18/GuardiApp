<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_legal',
        'trade_name',
        'company_type',
        'rnc',
        'phone_primary',
        'phone_office',
        'phone_emergency',
        'address',
        'email',
        'logo_path',
        'timezone',
        'locale',
        'currency',
        'billing_info',
        'status',
    ];

    protected $casts = [
        'billing_info' => 'array',
    ];

    /**
     * Get the branches for the company.
     */
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    /**
     * Get the users for the company.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
