<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    //
    public function login_check(){
        return view('pages.login');
    }
    //
    public function customer_registration(Request $request){
        $data=array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['password'] = md5($request->password);
        $data['mobile_number'] = $request->mobile_number;

        $customer_id = DB::table('tbl_customer')
            ->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect('/checkout');
    }
    //
    public function checkout(){
        /*
         $all_published_category=DB::table('tbl_category')
            ->where('publication_status', 1)
            ->get();

        $manage_published_category = view('pages.payment')
            ->with('all_published_category', $all_published_category);
        return view('layout')
            ->with('pages.payment', $manage_published_category);
            */
        return view('pages.checkout');
    }
    //
    public function save_shipping_details(Request $request){
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_first_name'] = $request->shipping_first_name;
        $data['shipping_last_name'] = $request->shipping_last_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_mobile_number'] = $request->shipping_mobile_number;
        $data['shipping_city'] = $request->shipping_city;
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        $shipping_id = DB::table('tbl_shipping')
            ->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect('/payment');
    }
    //
    public function customer_login(Request $request){
        $customer_email = $request->customer_email;
        $password = md5($request->password);
        $result = DB::table('tbl_customer')
            ->where('customer_email',$customer_email)
            ->where('password',$password)
            ->first();

            //echo "<pre>";
            //print_r($result);
            //echo "</pre>";
        if($result){
            Session::put('customer_id', $result->customer_id);
            return Redirect('/checkout');
        }else{
            return Redirect('/login-check');
        }
    }
    //
    public function customer_logout(){
        Session::flush();
        return Redirect::to('/');
    }
    //
    public function payment(){
        return view('pages.payment');
    }
    //
    public function order_place(Request $request){
        
        $payment_method = $request->payment_method;
        $data = array();
        $data['payment_method'] = $payment_method;
        $data['payment_status'] = 'pending';

        $payment_id = DB::table('tbl_payment')
            ->insertGetId($data);
            
        $odata = array();
        $odata['customer_id'] = Session::get('customer_id');
        $odata['shipping_id'] = Session::get('shipping_id');
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::getTotal();
        $odata['order_status'] = 'pending';

        $order_id = DB::table('tbl_order')
            ->insertGetId($odata);

        $contents = Cart::getContent();
        $oddata = array();

        foreach ($contents as $v_content) {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $v_content->id;
            $oddata['product_name'] = $v_content->name;
            $oddata['product_price'] = $v_content->price;
            $oddata['product_sales_quantity'] = $v_content->quantity;

            DB::table('tbl_order_details')
            ->insert($oddata);
        }
        if($payment_method == 'visa'){
            echo "Successfully done by Visa";
        }else if($payment_method == 'master_card'){
            echo "Successfully done by MasterCard";
        }else if($payment_method == 'amex'){
            echo "Successfully done by Amex";
        }else if($payment_method == 'vishwa'){
            echo "Successfully done by Vishwa";
        }else if($payment_method == 'ez_cash'){
            echo "Successfully done by Ez Cash";
        }

    }
}
