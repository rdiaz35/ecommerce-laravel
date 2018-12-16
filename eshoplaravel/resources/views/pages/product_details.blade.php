@extends('layout')
@section('content')
      <div class="col-sm-9 padding-right">
            <div class="product-details">
                  <div class="col -sm-5">
                        <img src="{{URL::to($product_by_details->product_image)}}" alt="" />
                        <h3>ZOOM</h3>
                  </div>
            </div>
            <div class="col-sm-7">
                  <div class="product-information">
                        <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                        <h2>{{$product_by_details->product_name}}</h2>
                  </div>
            <div>
      </div>
@endsection