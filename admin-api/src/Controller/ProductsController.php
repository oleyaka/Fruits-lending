<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\ProductsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Environment;

class ProductsController extends AbstractController
{
    public function __construct(
        private readonly ProductsService $productsService,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $data = $this->productsService->index();

        return new JsonResponse($data);
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->productsService->show($id);

        return new JsonResponse($data);
    }

    public function store(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $id = $this->productsService->store($data);

        return new JsonResponse($id);
    }

    public function edit(int $id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $this->productsService->edit($id, $data);

        return new JsonResponse(['message' => 'ok']);
    }

    public function delete(int $id): JsonResponse
    {
        $this->productsService->delete($id);

        return new JsonResponse(['message' => 'ok']);
    }


}