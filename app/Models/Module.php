<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'moduleName',
        'percentage',
    ];

    /**
     * Get the project that owns the Module
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get all of the stain for the Module
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stain(): HasMany
    {
        return $this->hasMany(Stain::class);
    }
}
