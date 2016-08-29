<?php

namespace App\Observers;

use App\Models\Blog;

class BlogObserver
{
    /**
     * Listen to the blog creating event.
     *
     * @param  blog  $blog
     * @return void
     */
    public function creating(Blog $blog)
    {
        //
    }

    /**
     * Listen to the blog created event.
     *
     * @param  Blog   $blog
     * @return [type]
     */
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

    /**
     * Listen to the blog deleted event.
     *
     * @param  blog  $blog
     * @return void
     */
    public function deleted(Blog $blog)
    {
        //
    }
}