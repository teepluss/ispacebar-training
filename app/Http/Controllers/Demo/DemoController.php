<?php

namespace App\Http\Controllers\Demo;

use Gate;
use App\Http\Controllers\Controller;

use Teepluss\Demo\Facades\DR;
use Teepluss\Demo\Contracts\Request as DemoRequest;

class DemoController extends Controller
{
    /**
     * Variable inject from AppServiceProvider.
     *
     * @param string $variableName
     */
    public function __construct($variableName)
    {
        // Return iSpacebar
        //dump($variableName);
    }

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
        //$sms = app()->make('SMSService');
        $sms = resolve('SMSService');

        $response = $sms->to('08766554433')->message('Hi')->send();

        dump($response);
    }

    public function user()
    {
        $user = \App\User::find(1);
        dump($user->can('update-blog', \App\Models\Blog::find(10)));

        // dump($user->getMergedPermissions());
        // dump($user->can('superadmin'));
    }
}