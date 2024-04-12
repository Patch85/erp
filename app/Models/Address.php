<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

class Address extends Model
{
    use BlameableTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'attention',
        'street_1',
        'street_2',
        'city',
        'state',
        'postal_code',
        'country_code',
    ];


    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
