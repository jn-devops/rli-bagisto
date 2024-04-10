<?php

namespace Webkul\Blog\Validations;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Webkul\Blog\Repositories\BlogTagRepository;

class BlogTagUniqueSlug implements Rule
{
    /**
     * Reserved slugs.
     *
     * @var array
     */
    protected $reservedSlugs = [
        'blog_tags',
    ];

    /**
     * Is slug reserved.
     *
     * @var bool
     */
    protected $isSlugReserved = false;

    /**
     * Constructor.
     *
     * @param  string  $tableName
     * @param  string  $id
     */
    public function __construct(
        protected $tableName = null,
        protected $id = null
    ) {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (in_array($value, $this->reservedSlugs)) {
            return ! ($this->isSlugReserved = true);
        }

        return $this->isSlugUnique($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ($this->isSlugReserved) {
            return trans('admin::app.validations.slug-reserved');
        }

        return trans('admin::app.validations.slug-being-used');
    }

    /**
     * Checks slug is unique or not.
     *
     * @param  string  $slug
     * @return bool
     */
    protected function isSlugUnique($slug)
    {
        return ! $this->isSlugExistsInCategories($slug);
    }

    /**
     * Is slug is exists in categories.
     *
     * @param  string  $slug
     * @return bool
     */
    protected function isSlugExistsInCategories($slug)
    {
        if (
            $this->tableName
            && $this->id
            && $this->tableName === 'blog_tags'
        ) {
            return app(BlogTagRepository::class)->where('id', '<>', $this->id)
                ->where('slug', $slug)
                ->limit(1)
                ->select(DB::raw(1))
                ->exists();
        }

        return app(BlogTagRepository::class)->where('slug', $slug)
            ->limit(1)
            ->select(DB::raw(1))
            ->exists();
    }
}
