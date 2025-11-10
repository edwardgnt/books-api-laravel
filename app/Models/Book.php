<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'year_published',
        'price',
        'is_archived',
    ];

    protected $casts = [
        'is_archived'    => 'boolean',
        'price'          => 'float',
        'year_published' => 'integer',
    ];
}
