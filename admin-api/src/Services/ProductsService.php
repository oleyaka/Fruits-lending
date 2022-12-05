<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\ProductsRepository;

class ProductsService
{
    public function __construct(
        private readonly ProductsRepository $productsRepository,
    ) {}

    public function index(): array
    {
        return $this->productsRepository->index();
    }

    public function show(int $id): array
    {
        return $this->productsRepository->show($id);
    }

    public function store(array $data): int
    {
        return $this->productsRepository->store($data);
    }

    public function edit(int $id, array $data): void
    {
        $this->productsRepository->edit($id, $data);
    }

    public function delete(int $id): void
    {
        $this->productsRepository->delete($id);
    }
}
