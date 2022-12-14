<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish_Ingredient extends Model
{
    use HasFactory;

    protected $table = 'dish_ingredient';
    protected $fillable = [
        'dish_id',
        'ingredient_id',
    ];
}
