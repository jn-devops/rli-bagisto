<?php

namespace Webkul\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\Blog\Contracts\Comment as BlogCommentContract;

class Comment extends Model implements BlogCommentContract
{
    use HasFactory;

    /**
     * The table associated with the model.
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
        return $this->hasOne('Webkul\Blog\Models\Blog', 'id', 'post');
    }
}