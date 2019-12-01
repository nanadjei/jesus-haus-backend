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
}
