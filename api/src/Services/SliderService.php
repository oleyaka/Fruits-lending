<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\SliderRepository;

class SliderService
{
    private SliderRepository $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index(): array
    {
        return $this->sliderRepository->getAll();
    }
}