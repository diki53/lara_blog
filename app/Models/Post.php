<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'author', 'body'];
    protected $with =['author', 'category'];
    
    public function author(): BelongsTo{
        return $this->belongsTo(User::class, 'author_id');
    }
    public function category(): BelongsTo{
        return $this->belongsTo(CategoryBlog::class, 'category_id');
    }
}
