<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'published_date',
        'category_id',
        'writer_id',
        'image',
        'is_popular',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_popular' => 'boolean',
    ];

    /**
     * Get the category that owns the article.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the writer that owns the article.
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class);
    }
}

