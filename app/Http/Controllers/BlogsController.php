<?php

namespace App\Http\Controllers;

class BlogsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('blogs.create', ['name' => 'Tee']);
    }

    public function store()
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}