<?php


namespace App\Http\Controllers;


use App\Bill;
use App\BillDetail;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class BillDetailsController extends Controller
{
    public function getListBill(){
       $bills = Bill::all()->sortByDesc('created_at');
        return view('admin.billdetails.bill', ['bills'=>$bills]);
    }
    public function listproduct($id, $id_customer){
        $details = BillDetail::where('id_bill',$id)->get();
        $customer = Customer::find($id_customer);
        $status_bill = Bill::find($id);
        return view('admin.billdetails.listproduct', ['details'=>$details,'customer'=>$customer,'status_bill'=>$status_bill]);
    }
    public function status_bill(Request $request, $id){
        $bill = Bill::find($id);
        $bill->status = $request->status_bill;
        $bill->save();
        return redirect::back();
    }
}
