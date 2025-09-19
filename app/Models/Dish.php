<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dish extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredient(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipes')->withPivot('amount');
    }

    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'dish_tag');
    }
}
