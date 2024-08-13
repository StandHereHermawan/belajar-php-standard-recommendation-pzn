<?php

namespace AriefKarditya\PhpStandardRecommendation\Controller;

use AriefKarditya\PhpStandardRecommendation\Service\ProductService;

class ProductController
{
    public function __construct(public ProductService $productService) {}
}
