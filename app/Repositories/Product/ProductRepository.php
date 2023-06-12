<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepositories;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Product::class;
    }
    public function getRelatedProducts($product, $limit =4)
    {
        return $this->model->where('product_category_id',$product->product_category_id)
            ->where('tag',$product->tag)
            ->limit($limit)
            ->get();
    }
    public function getFeaturedProductsByCategory($categoryId ,$limit=8)
    {
        return $this->model->where('featured',true)
            ->where('product_category_id',$categoryId)
            ->limit($limit)
            ->get();
    }
    public function getProductOnIndex()
    {
        $product = $this->model->paginate(9);
        return $product;
    }

    public function searchProducts($keyword)
    {
        $product = $this->model->where('name', 'like', '%' . $keyword . '%')->paginate(9);
        return $product;
    }

}
