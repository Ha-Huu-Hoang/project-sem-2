<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\BaseRepositories;
use Illuminate\Http\Request;

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


        $search =$request->search ?? '';

        $product =$this->model->where('name','like','%'. $search .'%');

        $product =$this->sortAndPagination($product,$request);

        return $product;
    }


    public function getProductByCategory($categoryName,$request)
    {
        $product = ProductCategory::where('name', $categoryName)->first()->products->toQuery();
        $product = $this->sortAndPagination($product,$request);
        return $product;
    }
    private function sortAndPagination($product , Request $request)
    {
        $perPage=$request->show ?? 3;
        $sortBy =$request->sort_by ?? 'latest';

        switch ($sortBy){
            case 'latest':
                $product =  $product->orderBy('id');
                break;
            case 'oldest':
                $product =  $product->orderByDesc('id');
                break;
            case 'name-ascending':
                $product =  $product->orderBy('name');
                break;
            case 'name-descending':
                $product =  $product->orderByDesc('name');
                break;
            case 'price-ascending':
                $product =  $product->orderBy('price');
                break;
            case 'price-descending':
                $product =  $product->orderByDesc('price');
                break;
            default:
                $product =  $product->orderBy('id');
        }

        $product = $product->paginate($perPage);
        $product->appends(['sort_by'=>$sortBy,'show'=>$perPage]);
        return $product;
    }

}
