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

    /**
     * Get all categories with specified type
     */
    public static function pertainingToSlug($slug)
    {
        return static::where('slug', $slug);
    }

    /** 
     * Get all cashflows with this category. Been it "tithes". "dues";
     */
    public function cashflows()
    {
        return $this->hasMany(Cashflow::class);
    }
}
