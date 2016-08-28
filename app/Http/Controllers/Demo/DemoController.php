<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

use Teepluss\Demo\Facades\DR;
use Teepluss\Demo\Contracts\Request as DemoRequest;

class DemoController extends Controller
{
    // public function index(DemoRequest $demo)
    // {
    //     return view('demo.index');
    // }

    /**
     * Laravel collection
     * eg. https://laravel.com/docs/master/collections#method-filter
     *
     * @return void
     */
    public function collect()
    {
        $range = range(1, 100);
        $collect = collect($range);

        $data = $collect->filter(function($item, $key) {
            return ($item % 2) == 0;
        });

        return $data;
    }

    public function sms()
    {
        $sms = resolve('SMSService');
        $response = $sms->to('08766554433')->message('Hi')->send();

        dump($response);
    }
}