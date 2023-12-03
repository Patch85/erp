<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignamble.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'attention',
        'street_address',
        'line_2',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    /**
     * Get the parent addressable model
     *
     * An address can belong to one of several models (User, Location, etc.)
     */
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
