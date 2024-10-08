<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'date',
        'type',
        'category_id',
        'notes',
    ];

    public function user() // many to one
    {
        return $this->belongsTo(User::class);
    }

    public function category() // many to one
    {
        return $this->belongsTo(Category::class);
    }
}
