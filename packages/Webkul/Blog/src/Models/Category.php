<?php

namespace Webkul\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Webkul\Blog\Contracts\Category as BlogCategoryContract;
use Webkul\Blog\Repositories\BlogRepository;

class Category extends Model implements BlogCategoryContract
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'blog_categories';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
        'parent_id',
        'locale',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at',
    ];

    /**
     * Appends.
     *
     * @var array
     */
    protected $appends = [
        'image_url',
        'parent_category_name',
        'children',
        'assign_blogs',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function blog()
    {
        return $this->hasMany(Blog::class, 'default_category');
    }

    /**
     * Get image url for the category image.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if (! $this->image) {
            return;
        }

        return Storage::url($this->image);
    }

    /**
     * Get parent category name for the category.
     *
     * @return string
     */
    public function getParentCategoryNameAttribute()
    {
        if (! $this->parent_id || (int) $this->parent_id <= 0) {
            return;
        }

        return $this->find($this->parent_id)?->name ?? null;
    }

    /**
     * Get parent category for the category.
     *
     * @return string
     */
    public function getParentCategoryAttribute()
    {
        if (! $this->parent_id || (int) $this->parent_id <= 0) {
            return;
        }

        return $this->find($this->parent_id);
    }

    /**
     * Get child category for the category.
     *
     * @return string
     */
    public function getChildrenAttribute()
    {
        if (! $this->id || (int) $this->id <= 0) {
            return;
        }

        if (Session::has('bCatEditId')) {
            return $this->where('id', '!=', Session::get('bCatEditId'))->where('parent_id', $this->id)->get();
        }

        return $this->where('parent_id', $this->id)->get();
    }

    /**
     * Get child category for the category.
     *
     * @return string
     */
    public function getAssignBlogsAttribute()
    {
        if (! $this->id || (int) $this->id <= 0) {
            return 0;
        }

        $id = $this->id;

        $blogs = app(BlogRepository::class)->where('status', 1)
            ->where(
                function ($query) use ($id) {
                    $query->where('default_category', $id)
                        ->orWhereRaw('FIND_IN_SET(?, categorys)', [$id]);
                })
            ->get();

        if (! empty($blogs)) {
            $assignBlogs = count($blogs);
        }

        return $assignBlogs;
    }
}
