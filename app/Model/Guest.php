<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guest extends Model
{
    public $timestamps = false;

    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class);
    }
}