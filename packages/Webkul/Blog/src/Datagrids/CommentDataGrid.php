<?php

namespace Webkul\Blog\Datagrids;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Webkul\Blog\Models\Blog;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\DataGrid\DataGrid;

class CommentDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder()
    {
        $loggedInUser = auth()->guard('admin')->user();

        $userId = $loggedInUser->id ?? 0;

        $role = $loggedInUser->role->name ?? 'Administrator';

        $queryBuilder = DB::table('blog_comments');

        if ($role != 'Administrator') {
            $blogs = Blog::where('author_id', $userId)->get();

            $post_ids = ! empty($blogs) ? $blogs->pluck('id')->toarray() : [];

            $queryBuilder->whereIn('blog_comments.post', $post_ids);
        }

        $queryBuilder->select('blog_comments.id', 'blog_comments.post', 'blog_comments.author', 'blog_comments.email', 'blog_comments.comment', 'blog_comments.status', 'blog_comments.created_at');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('blog::app.datagrids.comment.id'),
            'type'       => 'number',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'post',
            'label'      => trans('blog::app.datagrids.comment.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => false,
            'closure'    => function ($row) {
                $post = app(BlogRepository::class)->where('id', $row->post)->first();

                return $post?->name ?? '-';
            },
        ]);

        $this->addColumn([
            'index'      => 'comment',
            'label'      => trans('blog::app.datagrids.comment.content'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('blog::app.datagrids.comment.status.title'),
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->status == 1) {
                    return '<span class="badge badge-md badge-warning label-pending">' . trans('blog::app.datagrids.comment.status.pending') . '</span>';
                } elseif ($row->status == 2) {
                    return '<span class="badge badge-md badge-success label-active">' . trans('blog::app.datagrids.comment.status.approved') . '</span>';
                } elseif ($row->status == 0) {
                    return '<span class="badge badge-md badge-danger label-canceled">' . trans('blog::app.datagrids.comment.status.rejected') . '</span>';
                }
            },
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('blog::app.datagrids.comment.published-at'),
            'type'       => 'datetime',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return Carbon::parse($row->created_at)->format('j F, Y');
            },
        ]);
    }

    public function prepareActions()
    {
        if (bouncer()->hasPermission('blog.comment.edit')) {
            $this->addAction([
                'title'  => trans('blog::app.datagrids.comment.edit'),
                'method' => 'GET',
                'route'  => 'admin.blog.comment.edit',
                'icon'   => 'icon-edit',
                'url'    => function ($row) {
                    return route('admin.blog.comment.edit', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('blog.comment.delete')) {
            $this->addAction([
                'title'  => trans('blog::app.datagrids.comment.delete'),
                'method' => 'POST',
                'route'  => 'admin.blog.comment.delete',
                'icon'   => 'icon-delete',
                'url'    => function ($row) {
                    return route('admin.blog.comment.delete', $row->id);
                },
            ]);
        }
    }

    public function prepareMassActions()
    {
        if (bouncer()->hasPermission('blog.comment.delete')) {
            $this->addMassAction([
                'type'   => 'delete',
                'label'  => trans('admin::app.datagrid.delete'),
                'title'  => trans('blog::app.datagrids.comment.delete'),
                'action' => route('admin.blog.comment.mass-delete'),
                'url'    => route('admin.blog.comment.mass-delete'),
                'method' => 'POST',
            ]);
        }
    }
}
