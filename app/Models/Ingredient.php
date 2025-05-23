<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    /**
     * Блюда, принадлежащие ингредиентам
     */
    public function dish(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class, 'recipes')->withPivot('amount');
    }
}
