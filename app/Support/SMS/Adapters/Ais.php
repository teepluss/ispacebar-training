<?php

namespace App\Support\SMS\Adapters;

class Ais
{
    protected $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function send($to, $message)
    {
        return "sending message `".$message."` to number ". $to. " via ais.";
    }
}