<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'owner_id',
        'location',
        'area',
        'budget',
        'start_date',
        'finish_date',
        'plan_link',
        'files'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }


    /**
     * Get all of the invoice for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get all of the estimate for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estimate()
    {
        return $this->hasMany(Estimate::class);
    }

    /**
     * Get all of the module for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function module()
    {
        return $this->hasMany(Module::class);
    }
}
