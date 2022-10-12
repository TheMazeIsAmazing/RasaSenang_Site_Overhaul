<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = [
        'date',
        'time',
        'name',
        'people',
        'email_address',
        'phone_number',
        'comments',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
