<?php


namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class SearchController extends PagesController
{
    public function Search(Request $request){
        $search = $request->search;
        $products = Product::where('name','LIKE',"%$search%")->get();
        return view('pages.search',['products'=>$products]);

    }
}
