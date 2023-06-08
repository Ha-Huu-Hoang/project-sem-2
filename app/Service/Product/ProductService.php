<?php

namespace App\Service\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Service\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
       $this->repository = $productRepository;
    }

    public function find($id)
    {
       $product = $this->repository->find($id);

        $sumRating = 0;
        $countRating = 0;
        if ($product->productComments !== null) {
            foreach ($product->productComments as $comment) {
                $sumRating += $comment->rating;
                $countRating++;
            }
        }
        $avgRating = $countRating != 0 ? $sumRating / $countRating : 0;
        $product->avgRating = $avgRating;
       return $product;
    }

    public function getRelatedProducts($product, $limit =4)
    {
       return $this->repository->getRelatedProducts($product,$limit);
    }
    public function getFeaturedProducts()
    {
        return [
          "men"=> $this->repository->getFeaturedProductsByCategory(1,8),
          "women"=>$this->repository->getFeaturedProductsByCategory(2,8),
        ];
    }



}
