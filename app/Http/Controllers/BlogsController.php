<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store()
    {
        //dump(request()->all());
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