<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $casts = [
        'is_published' => 'boolean'
    ];

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished(EloquentBuilder $query): void
    {
        $query->where('is_published',true);
    }

    public function scopeUnPublished(EloquentBuilder $query): void
    {
        $query->where('is_published',false);
    }
}
