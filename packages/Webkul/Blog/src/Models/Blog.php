<?php

namespace Webkul\Blog\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Blog\Models\Category;
use Webkul\Core\Models\ChannelProxy;
use Webkul\Core\Eloquent\TranslatableModel;
use  Webkul\Blog\Contracts\Blog as BlogContract;

class Blog extends TranslatableModel implements BlogContract
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'channels',
        'default_category',
        'author',
        'author_id',
        'categorys',
        'tags',
        'src',
        'status',
        'locale',
        'allow_comments',
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
        'assign_categorys',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'default_category');
    }

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

    public function getAssignCategorysAttribute()
    {
        $categorys = [];

        $categories_ids = array_values(array_unique(array_merge(explode(',', $this->default_category ), explode( ',', $this->categorys ))));
        
        if ( is_array($categories_ids) && !empty($categories_ids) && count($categories_ids) > 0 ) {
            $categories = Category::whereIn('id', $categories_ids)->get();
            $categorys = ( !empty($categories) && count($categories) > 0 ) ? $categories : array();
        }

        return $categorys;
    }
}