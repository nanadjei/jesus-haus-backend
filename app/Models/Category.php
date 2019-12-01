<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    /**
     * Get all categories with type "cashflow"
     */
    public function scopeCashFlow($query)
    {
        return $query->where('type', 'cash-flow');
    }

    /**
     * Get all categories with type "cashflow"
     */
    public function scopeUtility($query)
    {
        return $query->where('type', 'utility');
    }
}
