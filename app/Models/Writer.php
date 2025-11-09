<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Writer extends Model
{
    protected $fillable = [
        'name',
        'specialization',
        'bio',
    ];

    /**
     * Get the articles for the writer.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}

