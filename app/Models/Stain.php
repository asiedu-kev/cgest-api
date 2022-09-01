<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stain extends Model //tache
{
    use HasFactory;
    protected $fillable = [
        'task_name',
        'module_id',
        'starting_date',
        'ending_date',
        'status'
    ];

    /**
     * Get the module that owns the Stain
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
