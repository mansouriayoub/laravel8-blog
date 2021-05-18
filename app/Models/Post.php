<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = ['title', 'excerpt', 'body', 'slug'];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['serach'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%'.$search.'%')
                ->where('body', 'like', '%'.$search.'%')
            ;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
