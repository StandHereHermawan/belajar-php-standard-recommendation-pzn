<?php

namespace AriefKarditya\PhpStandardRecommendation\Service;

use AriefKarditya\PhpStandardRecommendation\Controller\ProductController;
use AriefKarditya\PhpStandardRecommendation\Repository\ProductRepository;
use AriefKarditya\PhpStandardRecommendation\Service\ProductService;
use DI\Container;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function dependencyInjection()
    {
        $repository = new ProductRepository();
        $service = new ProductService($repository);
        $controller = new ProductController($service);

        TestCase::assertInstanceOf(ProductRepository::class, $service->productRepository);
        TestCase::assertInstanceOf(ProductService::class, $controller->productService);
    }

    /**
     * @test
     */
    public function containerInterface()
    {
        $container = new Container();
        $controller = $container->get(ProductController::class);
        $this->assertNotNull($controller);
        $this->assertNotNull($controller->productService);
        $this->assertNotNull($controller->productService->productRepository);

        $service = $container->get(ProductService::class);
        $this->assertNotNull($service);
        $this->assertNotNull($service->productRepository);
        $this->assertSame($service->productRepository, $controller->productService->productRepository);

        $repository = $container->get(ProductRepository::class);
        $this->assertNotNull($repository);


        $this->assertInstanceOf(ProductController::class, $controller);
        $this->assertInstanceOf(ProductService::class, $service);
        $this->assertInstanceOf(ProductRepository::class, $repository);

        $this->assertSame($service->productRepository, $repository);
        $this->assertSame($controller->productService, $service);
    }
}
