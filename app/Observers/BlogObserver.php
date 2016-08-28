<?php

namespace App\Observers;

use App\Models\Blog;

class BlogObserver
{
    /**
     * Listen to the blog created event.
     *
     * @param  blog  $blog
     * @return void
     */
    public function creating(Blog $blog)
    {
        $blog->hashed = "hashed-123";
    }

    public function created(Blog $blog)
    {
        // Ping to google.
        // Insert to another software.
        // Inert to log.
    }

    /**
     * Listen to the blog deleting event.
     *
     * @param  blog  $blog
     * @return void
     */
    public function deleting(Blog $blog)
    {
        //
    }
}