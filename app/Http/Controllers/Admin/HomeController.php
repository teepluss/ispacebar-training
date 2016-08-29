<?php

namespace App\Http\Controllers\Admin;

class HomeController extends BaseAdminController
{
    public function index()
    {
        return redirect()->route('admin.blogs.index');
    }
}