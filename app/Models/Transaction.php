<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'date',
        'type',
        'category',
    ];

    public function user() // many to one
    {
        return $this->belongsTo(User::class);
    }
}
