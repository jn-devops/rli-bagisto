<?php

namespace Webkul\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\Blog\Contracts\Tag as BlogTagContract;

class Tag extends Model implements BlogTagContract
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'blog_tags';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'locale',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}