<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends BaseAdminController
{
    // public function __construct($variableName)
    // {
    //     dump($variableName);
    // }

    public function index()
    {
        $blogs = Blog::with(['user'])->get();

        //return $blogs;


        return view('admin.blogs.index', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->save();

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

        $t = new \TesseractOCR(storage_path('x.png'));
        //$x = $t->whitelist(range('a', 'z'), range(0, 9), '-_@')->run();
        dump($t->run());
        //dump(get_class_methods($t));

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}