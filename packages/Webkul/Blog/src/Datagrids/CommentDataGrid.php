<?php

namespace Webkul\Blog\Datagrids;

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
        $loggedIn_user = auth()->guard('admin')->user()->toarray();

        $user_id = (array_key_exists('id', $loggedIn_user)) ? $loggedIn_user['id'] : 0;
        
        $role = (array_key_exists('role', $loggedIn_user)) ? (array_key_exists('name', $loggedIn_user['role']) ? $loggedIn_user['role']['name'] : 'Administrator') : 'Administrator';

        $queryBuilder = DB::table('blog_comments');

        if ($role != 'Administrator') {
            $blogs = Blog::where('author_id', $user_id)->get();

            $post_ids = (! empty($blogs) && count($blogs) > 0) ? $blogs->pluck('id')->toarray() : [];
            
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
            'label'      => trans('blog::app.datagrid.id'),
            'type'       => 'number',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'post',
            'label'      => trans('blog::app.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => false,
            'closure'    => function ($row) {
                $post = app(BlogRepository::class)->where('id', $row->post)->first();
                
                $post_name = ($post && isset($post->name) && ! empty($post->name) && ! is_null($post->name)) ? $post->name : '-';

                return $post_name;
            },
        ]);

        $this->addColumn([
            'index'      => 'comment',
            'label'      => trans('blog::app.datagrid.content'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('blog::app.datagrid.status'),
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->status == 1) {
                    return '<span class="badge badge-md badge-warning label-pending">'.trans('blog::app.datagrid.pending').'</span>';
                } elseif ($row->status == 2) {
                    return '<span class="badge badge-md badge-success label-active">'.trans('blog::app.datagrid.approved').'</span>';
                } elseif ($row->status == 0) {
                    return '<span class="badge badge-md badge-danger label-canceled">'.trans('blog::app.datagrid.rejected').'</span>';
                }
            },
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('blog::app.datagrid.published_at'),
            'type'       => 'datetime',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->created_at != '' 
                    && $row->created_at != null) {
                    return date_format(date_create($row->created_at), 'j F, Y');
                }

                return '-';
            },
        ]);
    }

    public function prepareActions()
    {
        if (bouncer()->hasPermission('blog.comment.edit')) {
            $this->addAction([
                'title'  => 'edit',
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
                'title'  => 'delete',
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
                'title'  => 'Delete',
                'action' => route('admin.blog.comment.massdelete'),
                'url'    => route('admin.blog.comment.massdelete'),
                'method' => 'POST',
            ]);
        }
    }
}
