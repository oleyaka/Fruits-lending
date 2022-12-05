<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use App\Services\Service;
use App\Services\SliderService;
use App\Services\ProductsService;

class IndexController extends AbstractController
{
    private Environment $twig;
    private SliderService $sliderService;
    private ProductsService $productsService;

    public function __construct(Environment $twig, SliderService $sliderService, ProductsService $productsService)
    {
        $this->sliderService = $sliderService;
        $this->productsService = $productsService;
        $this->twig = $twig;
    }

    public function main(Request $request): Response
    {
        $slider = $this->sliderService->index();
        $slider = array_map(function ($item){
            return $item["imagePath"];
        }, $slider);

        $products = $this->productsService->index();
        
        $view = $this->twig->render("html.twig", [
            "slider"=> $slider,
            "products"=> $products,
        ]);

        return new Response($view);
    }

    public function admin(Request $request): Response
    {
        $view = $this->twig->render("admin.html.twig");

        return new Response($view);
    }
}
