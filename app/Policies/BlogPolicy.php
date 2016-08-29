<?php

namespace App\Policies;

use App\User;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the blog.
     *
     * @param  App\User         $user
     * @param  App\Models\Blog  $blog
     * @return mixed
     */
    public function view(User $user, Blog $blog = null)
    {
        return $user->hasPermission('blogs.view');
    }

    /**
     * Determine whether the user can create blogs.
     *
     * @param  App\User         $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('blogs.write');
    }

    /**
     * Determine whether the user can update the blog.
     *
     * @param  App\User         $user
     * @param  App\Models\Blog  $blog
     * @return mixed
     */
    public function update(User $user, Blog $blog = null)
    {
        return $user->hasPermission('blogs.write');
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  App\User         $user
     * @param  App\Models\Blog  $blog
     * @return mixed
     */
    public function delete(User $user, Blog $blog = null)
    {
        return $user->hasPermission('blogs.delete');
    }

    /**
     * Determine whether the user can approve the blog.
     *
     * @param  App\User         $user
     * @param  App\Models\Blog  $blog
     * @return mixed
     */
    public function approve(User $user, Blog $blog = null)
    {
        return $user->hasPermission('blogs.approve');
    }

    /**
     * User update there blog post.
     *
     * @param  User      $user
     * @param  Blog|null $blog
     * @return boolean
     */
    public function updateBlog(User $user, Blog $blog)
    {
        return $user->id === $blog->user_id;
    }
}
