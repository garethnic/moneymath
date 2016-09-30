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
     * Set relationship with User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}