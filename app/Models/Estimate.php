<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model //Devis
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'client_name',
        'designation',
        'quantity',
        'unit_price',
        'amount',
        'total'
    ];

    /**
     * Get the project that owns the Estimate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
