<?php


namespace App\Http\Controllers;

//use Illuminate\Http\Request; // class cua laravel se check tham so GET Or Post
use App\Category;
use App\Http\Controllers\Requests\ProductRequest; //Cai nay cua em nen dat ten khac di dung trung voi no
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function products(){
        $products = Product::all();
        return view('admin.products.products', ['products'=>$products]);
    }
    public function getAddProduct(){
        $categories = Category::all();
        return view('admin.products.addProduct',['categories'=>$categories]);
    }
    public function postAddProduct(ProductRequest $request){
        $products = new Product();
        $products->name = $request->name;
        $products->description = $request->desc;
        $products->category_id = $request->category_id;
        $products->old_price = $request->old_price;
        $products->new_price = $request->new_price;
        $products->image = $request->image;

        //check has file thì mới xử lý upload không thi bỏ qua
        if ($request->hasFile('image')) {
            //get file from input
            $image = $request->file('image');
            //get file name - ham time() trong php de get ra time vi du 9822828
            $name = time().'-'.$image->getClientOriginalName();
            //path - duong dan store
            $destinationPath = public_path('/uploads/brand');
            //chuyen file tạm thành file chính
            $image->move($destinationPath, $name);
            $products->image = $name;
        }

        $products->save();
        return Redirect::to('admin/products');
    }
    public function getEditProduct($id){
        $products = Product::find($id);
        $categories = Category::all();
        return view('admin.products.editProduct', [
            'product'=>$products,
            'categories'=>$categories
        ]);
    }
    public function postEditProduct(ProductRequest $request, $id){
        $products = Product::find($id);
        $products->name = $request->name;
        $products->description = $request->desc;
        $products->category_id = $request->category_id;
        $status = (isset($request->status)) ? 1 : 0;
        $products->status = $status;
        $products->old_price = $request->old_price;
        $products->new_price = $request->new_price;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return Redirect::to('admin/products/editProduct/' . $id)->with('error', 'Định dang ảnh chỉ có thể là jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_" . $name;
            while (file_exists("uploads/brand/" . $image)) {
                $image = Str::random(4) . "_" . $name;
            }
            $file->move(public_path() . '/uploads/brand/', $image);
            $products->image = $image;
        }
        $products->update();
        return Redirect::to('admin/products');
    }
    public function getDelProduct($status){
        $product = Product::find($status);
        $check = Product::where('status','=',$status)->first();
        if($check == 1 ){
            return Redirect::to('admin/products')->with('error','Còn sản phẩm,không thể xóa!!');
        }
        $product->delete();
        return Redirect::to('admin/products')->with('success','Xóa thành công');

    }
}
