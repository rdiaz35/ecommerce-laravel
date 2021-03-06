<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //METODO PARA AGREGAR AL CARRITO
    public function add_to_cart(Request $request){
        $qty = $request->quantity;
        $product_id = $request->product_id;
        $product_info = DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->first();
        //print_r($product_info);

        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['quantity']= $qty;
        $data['attributes']['image']=$product_info->product_image;

        Cart::add($data);
        return Redirect::to('/show-cart');
    }
    //MUESTRA LOS PRODUCTOS DEL CARRO
    public function show_cart(){

        $all_published_category=DB::table('tbl_category')
            ->where('publication_status', 1)
            ->get();

        $manage_published_category = view('pages.add_to_cart')
            ->with('all_published_category', $all_published_category);
        return view('layout')
            ->with('pages.manage_published_category', $manage_published_category);

    }
    //ELIMINA DEL CARRITO
    public function delete_to_cart($id){
        Cart::remove($id);
        return Redirect::to('/show-cart');
    }
    //ACTUALIZA EL CARRITO
    public function update_cart(Request $request){
        $qty = $request->quantity;
        $id = $request->id;
        $submit = $request->submit;
        echo "$submit";
        if ($submit == "-"){
            Cart::update($id, array(
                'quantity' => -1,
            ));
        }else{
             Cart::update($id, array(
                'quantity' => 1,
            ));
        }
        return Redirect::to('/show-cart');
    }
}
