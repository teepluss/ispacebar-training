<?php

namespace App\Listeners;

use App\Events\BlogCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToEditor
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BlogCreated  $event
     * @return void
     */
    public function handle(BlogCreated $event)
    {
        $blog = $event->model;

        \Mail::send('emails.blogs.to_editor', ['blog' => $blog] , function($message) use ($blog) {
            $message->to('editor@101.dev', 'John Smith')
                    ->subject('Can you see the post: '.$blog->title.'?');
        });

        // \Mail::to('teepluss@101.dev')
        //     ->send(new \App\Mail\BlogPosted());
    }
}
