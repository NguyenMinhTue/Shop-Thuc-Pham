<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Category;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use App\Slide;


class PagesController extends Controller
{
    function __construct(){
        $categories = Category::all();
        view()->share('categories',$categories);
    }
    public function home(){
        $bestproduct = Product::all()->sortByDesc('count_buy')->take(8);
        return view('pages.home',
            ['bestproduct'=>$bestproduct]
         );

    }
    public function bestproduct(){

//       return view('pages.home',compact('slide'));
        //    $products = Product::;

        return view('pages.bestproduct'
        // ['products'=>$products]
        );

    }
    public function products(){
        $category = Category::all();

        return view('pages.products',['category'=>$category]);
    }
    public function category($id){
        $products = Product::Where('category_id',$id)->paginate(8);
        $category = Category::Where('id',$id)->first();
        $slide = Slide::Where('category_id',$id)->first();
        return view('pages.category',
            ['products'=>$products,
            'category'=>$category,
            'slide'=>$slide]
        );
    }
    public function mail(){
        return view('pages.mail');
    }
    public function chitietsanpham($id){
        $product = Product::Where('id',$id)->first();
        return view('pages.chitietsanpham',
            ['product'=>$product]);
    }
    public function gioithieu(){
        return view('pages.gioithieu');
    }
    public function dichvu(){
        return view('pages.dichvu');
    }

    public function checkout(Request $request){

        return view('pages.checkout');
    }
    //luu gio hang vao database
    public function checkoutSave(Request $request){
//        var_dump("daveo"); exit();
        $this->validate($request,[
        'name'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'address'=>'required'
        ],[
            'name.required'=>'Bạn phải nhập họ tên.',
            'phone.required'=>'Bạn phải nhập số điện thoại.',
            'gender.required'=>'Bạn phải nhập giới tính.',
            'address.required'=>'Bạn phải nhập địa chỉ.',
        ]);
        $customer = new Customer;
        $customer -> name = $request-> name;
        $customer -> address = $request-> address;
        $customer -> gender = $request-> gender;
        $customer -> phone_number = $request-> phone;
        $customer -> save();
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $product){
            $total+= $product['quantity']*$product['price'];
        }
        $bill = new Bill;
        $bill->id_customer = $customer ->id ;
        $bill -> date_order = $customer -> created_at;
        $bill ->total = $total;
        $bill->save();
        foreach ($cart as $id => $product){
            $product12 = Product::find($product['id']);
            $product12->count_buy = $product12->count_buy + $product['quantity'];
            $product12->save();

            $detai = new BillDetail;
            $detai -> id_bill = $bill -> id;
            $detai -> id_product = $product['id'];
            $detai -> quantity = $product['quantity'];
            $detai -> price = $product['price'];
            $detai -> save();
            unset($cart[$id]);
            session()->put('cart', $cart);
        }


        return redirect(Route('checkout'))->with('message','Đặt hàng thành công.');
    }
    public function addcart($id)
    {

        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "id"=>$product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->new_price,
                    "photo" => $product->image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id"=>$product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->new_price,
            "photo" => $product->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }
    public function update(Request $request)
    {

        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Update giỏ hàng thành công!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Xóa sản phẩm khỏi giỏ hàng thành công!');
        }
    }

}
