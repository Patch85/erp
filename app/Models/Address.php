<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
