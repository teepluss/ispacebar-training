<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

use Teepluss\Demo\Facades\DR;
use Teepluss\Demo\Contracts\Request as DemoRequest;

class DemoController extends Controller
{
    public function index(DemoRequest $demo)
    {
        return view('demo.index');
    }
}