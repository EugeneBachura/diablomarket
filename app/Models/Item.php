<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'type', 'characteristics', 'ancestral', 'power'];

    protected $casts = [
        'characteristics' => 'array',
    ];
}
