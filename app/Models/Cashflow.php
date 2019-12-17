<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["category_id", "staff_id", "type", "description", "amount", "receiver_or_giver", "as_at"];

    /**
     * The category which this cashflow belongs to
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope cashflow by income
     */
    public function scopeIncome($query)
    {
        return $query->where('type', 'income');
    }

    /**
     * Scope cashflow by expense
     */
    public function scopeExpense($query)
    {
        return $query->where('type', 'expense');
    }
}
