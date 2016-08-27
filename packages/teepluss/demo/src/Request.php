<?php

namespace Teepluss\Demo;

use Teepluss\Demo\Contracts\Request as RequestContracts;

class Request implements RequestContracts
{
    public function log()
    {
        return true;
    }
}