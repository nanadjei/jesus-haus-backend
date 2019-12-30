<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["name", "description", "is_published"];

    /** 
     * Cast some columns into a way which can be easy to work with.
     * Example: cast into object, array or boolean.
     */
    protected $casts = ["is_published" => "boolean"];
}
