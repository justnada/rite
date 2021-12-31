<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['title', 'author', 'excerpt', 'body'];

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    // scope query
    public function scopeFilter($query, array $filters)
    {
        // posts search
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' .  $search . '%')
                    ->orWhere('excerpt', 'like', '%' .  $search . '%')
                    ->orWhere('body', 'like', '%' .  $search . '%');
            });
        });

        // category search
        $query->when($filters['category'] ?? false, function ($query, $category) {
            // whereHas is for joining table using relation name which we use 'category'
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // author search
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            // whereHas is for joining table using relation name which we use 'author'
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    // relation name with table category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relation name with table user
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // creating default key
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // plugin automatic create sluggable
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
