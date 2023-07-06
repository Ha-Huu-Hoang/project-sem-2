<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Service\Brand\BrandServiceInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $BrandService;
    public function __construct(BrandServiceInterface  $brandService)
    {
        $this-> BrandService = $brandService;
    }
    public function index(Request $request)
    {
        $status = $request->input('status');
        $list_act = [
            'delete' => 'Temporary delete'
        ];
        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $brand = Brand::onlyTrashed()->paginate(10);
        } else {

            $search = '';
            if ($request->input('search')) {
                $search = $request->input('search');
            }
            $brand = Brand::where('name', 'LIKE', "%{$search}%")->paginate(10);
        }
        $count_user_active = Brand::count();
        $count_user_trash = Brand::onlyTrashed()->count();
        $count = [$count_user_active, $count_user_trash];
        return view('admin.brand.index', compact('brand', 'count', 'list_act', 'status'));
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('admin/brand')->with('status', 'Deleted member successfully');
    }
    public function create(){
        return view('admin.brand.create');
    }
    public function store(Request $request){
        $request->validate([
                'name'=>'required|string|max:255',
            ]
        );
        $name = $request->input('name');

        // Kiểm tra xem tên danh mục đã tồn tại hay chưa
        $existingBrand = Brand::where('name', $name)->first();
        if ($existingBrand) {
            return back()->with('notification', 'ERROR: Category name already exists');
        }
        $data =$request->all();
        $this->BrandService->create($data);
        return redirect('admin/brand')->with('status','You have successfully added');
    }
    public function action(Request $request){
        $list_check =$request->input('list_check');
        if ($list_check){
            if (!empty($list_check)){
                $act =$request->input('act');
                if ($act == 'delete'){
                    Brand::destroy($list_check);
                    return redirect('admin/brand')->with('status','You have successfully deleted');
                }
                if ($act == 'restore'){
                    Brand::withTrashed()
                        ->whereIn('id',$list_check)
                        ->restore();
                    return redirect('admin/brand')->with('status','You have successfully recovered');
                }
                if ($act == 'forceDelete'){
                   Brand::withTrashed()
                        ->whereIn('id',$list_check)
                        ->forceDelete();
                    return redirect('admin/brand')->with('status','You have permanently deleted');
                }
            }
            return redirect('admin/brand')->with('status','You need to choose to perform');
        }
    }
    public function edit($id)
    {
        $brand =Brand::find($id);
        return view('admin.brand.edit',['brand' => $brand]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
                'name'=>'required|string|max:255',
            ]
        );
        $name = $request->input('name');

        // Kiểm tra xem tên danh mục đã tồn tại hay chưa
        $existingBrand = Brand::where('name', $name)->first();
        if ($existingBrand) {
            return back()->with('notification', 'ERROR: Category name already exists');
        }
        $data =$request->all();
        $this->BrandService->update($data,$id);
        return redirect('admin/brand')->with('status','You have successfully fixed');
    }
}
