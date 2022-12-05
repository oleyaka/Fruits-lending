<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\ProductsRepository;

class ProductsService
{
    private ProductsRepository $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function index(): array
    {
        return $this->productsRepository->getAll();
    }
}