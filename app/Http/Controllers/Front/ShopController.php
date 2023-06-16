<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    private $productService;
    private $productCommentService;
    private $productCategoryService;
    public function __construct(ProductServiceInterface $productService,
                                ProductCommentServiceInterface $productCommentService,
                                ProductCategoryServiceInterface $productCategoryService
    )
    {
        $this->productService =$productService;
        $this->productCommentService =$productCommentService;
        $this->productCategoryService =$productCategoryService;
    }

    public function show($id)
    {
        $product = $this ->productService->find($id);
        $pro = $this ->productService->getRelatedProducts($product);
        return view('front.shop.show',compact('product','pro'));
    }
    public function postComment(Request $request)
    {
        $this->productCommentService->create($request->all());
        return redirect()->back();
    }

    public function index( Request $request)
    {
        $category = $this->productCategoryService->all();
        $product = $this->productService->getProductOnIndex($request);
        $title = 'Shop';

        return view('front.shop.index', compact('category','product', 'title'));
    }


    public function category($categoryName,Request $request)
    {
        $category = $this->productCategoryService->all();
        $product = $this->productService->getProductByCategory($categoryName,$request);
        $title = 'Shop';
        return view('front.shop.index', compact('category','product', 'title'));
    }

}

