<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url','title','meta_description','meta_keywords'];

    /**
     * Get posts associated with specified category
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get category slug
     */
    public function getSlugAttribute()
    {
        return url(Str::slug($this->title));
    }
}
