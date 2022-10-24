<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $fillable = [
        'name',
    ];
    public function dishes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Dishes::class, 'dish_ingredient', 'ingredient_id', 'dish_id');
    }
}
