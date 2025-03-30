<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    use HasFactory;

    /**
     * Получить категорию блюда
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Ингредиенты принадлежащие блюду
     */
    public function ingredient(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipes')->withPivot('amount');
    }
}
