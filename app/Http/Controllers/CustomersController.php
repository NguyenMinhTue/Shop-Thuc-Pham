<?php


namespace App\Http\Controllers;


use App\Bill;
use App\BillDetail;
use App\Customer;
use App\Product;

class CustomersController extends Controller
{
    public function customer(){
        $customers = Customer::all();

        return view('admin.customer.customers', ['customers'=>$customers]);
    }
    public function historyCus($id){

        $bills = Bill::where('id_customer',$id)->get();
        return view('admin.customer.historyCus', ['bills'=>$bills]);
    }
    public function detail_bill($id, $id_customer){
        $details = BillDetail::where('id_bill',$id)->get();
        $customer = Customer::find($id_customer);
        $status_bill = Bill::find($id);
        return view('admin.customer.detail_bill', ['details'=>$details,'customer'=>$customer,'status_bill'=>$status_bill]);
    }
}
