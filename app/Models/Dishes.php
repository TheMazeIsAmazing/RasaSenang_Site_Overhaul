<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;

    protected $table = 'dishes';
    protected $fillable = [
        'name',
        'description',
        'image',
        'highlighted',
    ];

    public function ingredients(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Ingredients::class, 'dish_ingredient', 'dish_id', 'ingredient_id');
    }
}
