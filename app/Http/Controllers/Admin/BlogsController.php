<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
//use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateBlogPost;

class BlogsController extends BaseAdminController
{
    // public function __construct($variableName)
    // {
    //     dump($variableName);
    // }

    public function index()
    {


        // Eager load user data.
        $blogs = Blog::with('user');

        if (request()->has('approved')) {
            $blogs->approved();
        }

        $blogs = $blogs->paginate();

        return view('admin.blogs.index', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(StoreBlogPost $request)
    {
        $blog = Blog::create($request->all());

        // Stamp a user to blog.
        $authUser = $request->user();
        $blog->user()->associate($authUser)->save();

        // \Mail::to('teepluss@101.dev')
        //     ->send(new \App\Mail\BlogPosted());

        return redirect()->route('admin.blogs.index')
                    ->with('success', 'Blog has been created');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', [
            'blog' => $blog
        ]);
    }

    public function update(UpdateBlogPost $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->get('title');
        $blog->body = $request->body;
        $blog->save();

        return redirect()->route('admin.blogs.edit', ['id' => $blog->id])
                    ->with('success', 'Blog has been updated');
    }

    /**
     * Delete a blog using softDeletes
     * eg.https://www.laravel.com/docs/5.3/eloquent
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index')
                    ->with('success', 'Blog has been delete');
    }

    /**
     * Approve content.
     *
     * @param  integer $id
     * @return void
     */
    public function approve($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->approved_at = \Carbon\Carbon::now();
        $blog->save();

        return redirect()->route('admin.blogs.index')
                    ->with('success', 'Content '.$blog->title. ' has been approved.');
    }
}