<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'specialization_id',
        // Add other doctor-specific fields
    ];

    /**
     * Define a one-to-one relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Define a many-to-one relationship with the Specialization model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    /**
     * Define a one-to-many relationship with the Appointment model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // Add the accessor for full name
    public function getFullNameAttribute()
    {
        return "{$this->user->first_name} {$this->user->last_name}";
    }
}
