<?php

namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'amount'
    ];

    /**
     * Convert value to cents
     *
     * @param $value
     */
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }

    /**
     * Convert value to rands
     *
     * @param $value
     * @return float|int
     */
    public function getAmountAttribute($value)
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