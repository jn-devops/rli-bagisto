<?php

namespace Webkul\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Blog\Contracts\Comment as CommentContract;

class Comment extends TranslatableModel implements CommentContract
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'blog_comments';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'post',
        'author',
        'name',
        'email',
        'comment',
        'parent_id',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blog()
    {
        return $this->hasOne(Blog::class, 'id', 'post');
    }
}