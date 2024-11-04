<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'slug', 'body'];

    /**
     * Relationship to the User (author).
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id'); // Ensure foreign key is correct
    }

    /**
     * Relationship to the Category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope for filtering posts based on search query and category.
     *
     * @param  Builder  $query
     * @param  array    $filters
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    
        return $query;
    }
}