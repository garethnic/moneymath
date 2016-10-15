<?php

namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total'
    ];

    /**
     * Convert value to cents
     *
     * @param $value
     */
    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = $value * 100;
    }

    /**
     * Convert value to rands
     *
     * @param $value
     * @return float|int
     */
    public function getTotalAttribute($value)
    {
        return $value / 100;
    }

    /**
     * Set relationship with User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}