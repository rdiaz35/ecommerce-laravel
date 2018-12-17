@extends('layout')
@section('content')

<section id="cart_items">
      <div class="container col-sm-12">
            <div class="breadcrumbs">
                  <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Shopping Cart</li>
                  </ol>
            </div>
            <div class="table-responsive cart_info">
                  <?php
                  $contents=Cart::getContent();

                  ?>
                  <table class="table table-condensed">
                        <thead>
                              <tr class="cart_menu">
                                    <td class="image">Image</td>
                                    <td class="description">Name</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td>Action</td>
                              </tr>
                        </thead>
                        <tbody>
                              @foreach ($contents as $v_contents) 
                              <?php
                                    $cantidad = $v_contents->quantity;
                                    $precio = $v_contents->price;
                                    $totallinea =  $cantidad * $precio;
                              ?>
                              
                              <tr>
                                    <td class="cart_product">
                                          <a href=""><img src="{{URL::to($v_contents->attributes->image)}}" height="80px" width="80px" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                          <h4><a href="">{{$v_contents->name}}</a></h4>
                                          
                                    </td>
                                    <td class="cart_description">
                                          <h4>{{$v_contents->price}}</h4>
                                    </td>
                                    <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                          <form action="{{url('/update-cart')}}" method="post">
                                                {{ csrf_field()}}
                                                <input type="submit" name="submit" value="+" class="btn btn-sm btn-default"/>
                                                <input class="cart_quantity_input" type="text" name="qty" value="{{$v_contents->quantity}}" autocomplete="off" size="2" disabled>
                                                <input  type="hidden" name="id" value="{{$v_contents->id}}"  >
                                                <input type="submit" name="submit" value="-" class="btn btn-sm btn-default"/>
                                          </form>
                                    </div>
                                    </td>
                                    <td class="cart_total">
                                          <p class="cart_total_price">{{$totallinea}}</p>
                                    </td>
                                    <td class="cart_delete">
                                          <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->id)}}"><i class="fa fa-times"></i></a>
                                    </td>
                              </tr>
                              @endforeach
                              
                        </tbody>
                  </table>
            </div>
      </div>
</section> <!--/#cart_items-->
<section id="do_action">
      <div class="container">
            <div class="heading">
                  <h3>What would you like to do next?</h3>
                  <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="breadcrumbs">
                  <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Payment method</li>
                  </ol>
            </div>
            <div class="paymentCont col-sm-8">
                  <div class="headingWrap">
                        <h3 class="headingTop text-center">Select Your Payment Method</h3>	
                        <p class="text-center">Created with bootsrap button and using radio button</p>
                  </div>
                  {{--
                  <div class="paymentWrap">
                        
                        <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                              {{--
                              <form action="{{url('/order-place')}}" method="post">
                                    {{csrf_field()}}
                                    <label class="btn paymentMethod active">
                                          <div class="method visa"></div>
                                          <input type="radio" name="payment_gateway" value="visa" checked> 
                                    </label>
                                    <label class="btn paymentMethod">
                                          <div class="method master-card"></div>
                                          <input type="radio" name="payment_gateway" value="master_card"> 
                                    </label>
                                    <label class="btn paymentMethod">
                                          <div class="method amex"></div>
                                          <input type="radio" name="payment_gateway" value="amex">
                                    </label>
                                    <label class="btn paymentMethod">
                                          <div class="method vishwa"></div>
                                          <input type="radio" name="payment_gateway" value="vishwa"> 
                                    </label>
                                    <label class="btn paymentMethod">
                                          <div class="method ez-cash"></div>
                                          <input type="radio" name="payment_gateway" value="ez_cash"> 
                                    </label>                         
                                    <input type="submit" class="btn btn-success" value="Done"/>
                              </form>
                              
                              
                        </div>        
                  </div>
                  --}}
                  <form action="{{url('/order-place')}}" method="post">
                        {{csrf_field()}}
                        <div class="radio">
                        <input type="radio" class="form-check-input" name="payment_method" value="visa"> Visa<br>
                        </div>
                        <div class="radio">
                        <input type="radio" class="form-check-input" name="payment_method" value="master_card"> MasterCard<br>
                        </div>
                        <div class="radio">
                        <input type="radio" class="form-check-input" name="payment_method" value="amex"> Amex<br>
                        </div>
                        <div class="radio">
                        <input type="radio" class="form-check-input" name="payment_method" value="vishwa"> Vishwa<br>
                        </div>
                        <div class="radio">
                        <input type="radio" class="form-check-input" name="payment_method" value="ez_cash"> Ez Cash<br>
                        </div>
                        <input type="submit" class="btn btn-success" value="Done"/>
                  </form>
            </div>
      </div>
</section><!--/#do_action-->

@endsection