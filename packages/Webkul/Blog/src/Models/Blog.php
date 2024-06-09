<?php

namespace Webkul\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Models\ChannelProxy;
use Webkul\Blog\Contracts\Blog as BlogContract;

class Blog extends Model implements BlogContract
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'channels',
        'src',
        'author',
        'author_id',
        'status',
        'locale',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published_at',
    ];

    /**
     * Appends.
     *
     * @var array
     */
    protected $appends = [
        'src_url',
    ];

    /**
     * Get the channels.
     */
    public function channels()
    {
        return $this->belongsToMany(ChannelProxy::modelClass(), 'channels');
    }

    /**
     * Get image url for the category image.
     *
     * @return string
     */
    public function getSrcUrlAttribute()
    {
        if (! $this->src) {
            return;
        }

        return Storage::url($this->src);
    }
}
