<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Video extends Model
{
    protected $dates = [
        'published_at',
        'created_at',
    ];

    protected $casts = [
        'published_at' => 'date',
        'created_at' => 'datetime',
    ];

    public $timestamps = false;

    public function guests(): BelongsToMany
    {
        return $this->belongsToMany(Guest::class);
    }
}