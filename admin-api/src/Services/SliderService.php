<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\SliderRepository;

class SliderService
{
    public function __construct(
        private readonly SliderRepository $sliderRepository,
    ) {}

    public function index(): array
    {
        return $this->sliderRepository->index();
    }

    public function show(int $id): array
    {
        return $this->sliderRepository->show($id);
    }

    public function store(array $data): int
    {
        return $this->sliderRepository->store($data);
    }

    public function edit(int $id, array $data): void
    {
        $this->sliderRepository->edit($id, $data);
    }

    public function delete(int $id): void
    {
        $this->sliderRepository->delete($id);
    }
}
