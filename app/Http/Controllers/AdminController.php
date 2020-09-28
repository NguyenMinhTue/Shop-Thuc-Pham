<?php


namespace App\Http\Controllers;


use App\Category;
use App\Product;

class AdminController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function dashboard(){
        return view('admin.dashboard');

    }

    public function products(){
        $products = Product::all();
        return view('admin.products.products', ['products'=>$products]);


    }
}
