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
    public function getProductOnIndex($request)
    {
        $perPage=$request->show ?? 3;
        $sortBy =$request->sort_by ?? 'latest';
        switch ($sortBy){
            case 'latest':
                $product =$this->model->orderBy('id');
                break;
            case 'oldest':
                $product =$this->model->orderByDesc('id');
                break;
            case 'name-ascending':
                $product =$this->model->orderBy('name');
                break;
            case 'name-descending':
                $product =$this->model->orderByDesc('name');
                break;
            case 'price-ascending':
                $product =$this->model->orderBy('price');
                break;
            case 'price-descending':
                $product =$this->model->orderByDesc('price');
                break;
            default:
                $product =$this->model->orderBy('id');
        }

        $product = $product->paginate($perPage);
        $product->appends(['sort_by'=>$sortBy,'show'=>$perPage]);
        return $product;
    }

    public function searchProducts($keyword)
    {
        $product = $this->model->where('name', 'like', '%' . $keyword . '%')->paginate(9);
        return $product;
    }

}
