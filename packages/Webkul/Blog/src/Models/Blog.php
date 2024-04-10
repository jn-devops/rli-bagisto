<?php

namespace Webkul\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Webkul\Blog\Contracts\Blog as BlogContract;
use Webkul\Core\Models\ChannelProxy;

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

    /**
     * get Assign Categorys Attribute.
     *
     * @return string
     */
    public function getAssignCategorysAttribute()
    {
        $categorys = [];

        $categoriesIds = array_values(array_unique(array_merge( explode( ',', $this->default_category ), explode( ',', $this->categorys))));
        
        if (! empty($categoriesIds)) {
            $categories = Category::whereIn('id', $categoriesIds)->get();
            
            $categorys = ! empty($categories) ? $categories : [];
        }

        return $categorys;
    }
}