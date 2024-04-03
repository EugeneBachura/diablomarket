<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementElixir extends Model
{
    use HasFactory;

    protected $fillable = [
        'advertisement_id',
        'elixir_id',
        'title',
        'description',
        'image',
    ];
}
