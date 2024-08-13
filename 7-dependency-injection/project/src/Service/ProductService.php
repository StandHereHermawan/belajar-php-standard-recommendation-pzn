<?php

namespace AriefKarditya\PhpStandardRecommendation\Service;

use AriefKarditya\PhpStandardRecommendation\Repository\ProductRepository;

class ProductService
{
    public function __construct(public ProductRepository $productRepository) {}
}
