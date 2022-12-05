<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Environment;

class IndexController extends AbstractController
{
    public function main(Request $request): JsonResponse
    {
        return new JsonResponse(["cats"=>234]);
    }
}