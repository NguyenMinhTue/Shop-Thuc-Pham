<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Requests\CategoryRequest;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Redirect;




class CategoriesController extends Controller
{
    public function categories(){
        $categories = Category::all();
        return view('admin.categories.categories', ['categories'=>$categories]);
    }
    public function getAddCategory(){
        return view('admin.categories.addCategory');
    }
    public function postAddCategory(CategoryRequest $request){
        $categories = new Category();
        $categories->name = $request->name;
        $categories->description = $request->desc;
        $categories->save();
        return Redirect::to('admin/categories');
    }
    public function getEditCategory($id){
            $category = Category::find($id);
            return view('admin.categories.editCategory', ['category'=>$category]);
    }
    public function postEditCategory(CategoryRequest $request, $id){

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->desc;
        $category->save();
        return Redirect::to('admin/categories');
    }
    public function getDelCategory($id){
        $category = Category::find($id);
        $check = Product::where('category_id','=',$id)->first();
        if($check){
            return Redirect::to('admin/categories')->with('error','Còn sản phẩm thuộc danh mục này');
        }
        $category->delete();
        return Redirect::to('admin/categories')->with('success','Xóa thành công');

    }
}

