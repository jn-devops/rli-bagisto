<?php

namespace Webkul\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Blog\Contracts\Tag as TagContract;

class Tag extends TranslatableModel implements TagContract
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