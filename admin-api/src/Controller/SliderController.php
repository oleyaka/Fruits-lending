<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\SliderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Environment;

class SliderController extends AbstractController
{
    public function __construct(
        private readonly SliderService $sliderService,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $data = $this->sliderService->index();

        return new JsonResponse($data);
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->sliderService->show($id);

        return new JsonResponse($data);
    }

    public function store(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $id = $this->sliderService->store($data);

        return new JsonResponse($id);
    }

    public function edit(int $id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $this->sliderService->edit($id, $data);

        return new JsonResponse(['message' => 'ok']);
    }

    public function delete(int $id): JsonResponse
    {
        $this->sliderService->delete($id);

        return new JsonResponse(['message' => 'ok']);
    }


}