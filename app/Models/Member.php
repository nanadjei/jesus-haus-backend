<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["department_id", "type", "title", "first_name", "last_name", "email", "dob", "phone"];

    /** Append data via json response */
    protected $appends = ["fullName"];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('department', function ($builder) {
            $builder->with("department");
        });
    }

    /**
     * Department that a member belongs to
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /** Get the fullName of a member including his title */
    public function getFullNameAttribute()
    {
        return $this->title . " " . $this->first_name . " " . $this->last_name;
    }

    /** Validation rules for creating a cashflow record */
    public function createRules(): array
    {
        return ["department_id" => "required|integer", "type" => "required|in:member,visitor", "title" => "required", "first_name" => "required|min:2", "last_name" => "required|min:2", "email" => "required", "dob" => "required|date", "phone" => "required|numeric"];
    }
}
