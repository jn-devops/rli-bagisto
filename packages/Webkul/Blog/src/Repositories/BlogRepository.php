<?php

namespace Webkul\Blog\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Webkul\Core\Eloquent\Repository;

class BlogRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'Webkul\Blog\Models\Blog';
    }

    /**
     * Save blog.
     *
     * @return bool|\Webkul\Blog\Contracts\Blog
     */
    public function save(array $data)
    {
        Event::dispatch('admin.blogs.create.before', $data);

        $createData = $data;

        if (array_key_exists('src', $createData)) {
            unset($createData['src']);
        }

        $blog = $this->create($createData);

        $this->uploadImages($data, $blog);

        Event::dispatch('admin.blogs.create.after', $blog);

        return true;
    }

    /**
     * Update item.
     *
     * @param  int  $id
     * @return bool
     */
    public function updateItem(array $data, $id)
    {
        Event::dispatch('admin.blogs.update.before', $id);

        $updateData = $data;

        if (array_key_exists('src', $updateData)) {
            unset($updateData['src']);
        }

        $blog = $this->update($updateData, $id);

        $this->uploadImages($data, $blog);

        Event::dispatch('admin.blogs.update.after', $blog);

        return true;
    }

    /**
     * Upload category's images.
     *
     * @param  array  $data
     * @param  \Webkul\Category\Contracts\Category  $category
     * @param  string  $type
     * @return void
     */
    public function uploadImages($data, $blog, $type = 'src')
    {
        if (isset($data[$type])) {
            foreach ($data[$type] as $imageId => $image) {
                $file = $type . '.' . $imageId;

                $dir = 'blog-images/' . $blog->id;

                if (request()->hasFile($file)) {
                    if ($blog->{$type}) {
                        Storage::delete($blog->{$type});
                    }

                    $manager = new ImageManager();

                    $image = $manager->make(request()->file($file))->encode('webp');

                    $blog->{$type} = $dir . '/' . Str::random(40) . '.webp';

                    Storage::put($blog->{$type}, $image);

                    $blog->save();
                }
            }
        } else {
            if ($blog->{$type}) {
                Storage::delete($blog->{$type});
            }

            $blog->{$type} = null;

            $blog->save();
        }
    }

    /**
     * Delete a blog item and delete the image from the disk or where ever it is.
     *
     * @param  int  $id
     * @return bool
     */
    public function destroy($id)
    {
        $blogItem = $this->find($id);

        $blogItemImage = $blogItem->src;

        Storage::delete($blogItemImage);

        return $this->model->destroy($id);
    }

    /**
     * Get only active blogs.
     *
     * @return array
     */
    public function getActiveBlogs()
    {
        $locale = config('app.locale');

        $blogs = DB::table('blogs')
            ->where('published_at', '<=', Carbon::now()->format('Y-m-d'))
            ->where('status', 1)
            ->where('locale', $locale)
            ->orderBy('id', 'DESC')
            ->paginate(12);

        return $blogs;
    }

    /**
     * Get only single blogs.
     *
     * @return array
     */
    public function getSingleBlogs($id)
    {
        $blog = DB::table('blogs')
            ->whereSlug($id)
            ->where('published_at', '<=', Carbon::now()->format('Y-m-d'))
            ->where('status', 1)
            ->first();

        return $blog;
    }

    /**
     * Get only single blogs.
     *
     * @return array
     */
    public function getBlogCategories($id)
    {
        $locale = config('app.locale');

        $categoryId = DB::table('blog_categories')
            ->where('slug', $id)->first();

        $blogs = DB::table('blogs')
            ->where('published_at', '<=', Carbon::now()->format('Y-m-d'))
            ->where('default_category', $categoryId['id'])
            ->where('status', 1)
            ->where('locale', $locale)
            ->orderBy('id', 'DESC')
            ->paginate(12);

        return $blogs;
    }
}
