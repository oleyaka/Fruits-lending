<?php

declare(strict_types=1);

namespace App\Services;

class Service
{
    private $service;

    public function test789()
    {
        echo $this->service;
    }

    public function __construct($service)
    {
        $this->service = $service;
    }
}

