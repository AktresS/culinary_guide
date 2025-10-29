<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dishes() : BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function steps() : HasMany
    {
        return $this->hasMany(Step::class);
    }
}
