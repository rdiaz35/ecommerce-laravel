@extends('layout')
@section('content')
<section id="cart_items">
      <div class="container">
            <div class="register-req">
                  <p>Please fillup this form</p>
            </div><!--/register-req-->
            <div class="shopper-informations">
                  <div class="row">
                        <div class="col-sm-12 clearfix">
                              <div class="bill-to">
                                    <p>Shipping Details</p>
                                    <div class="form-one">
                                          <form action="{{URL('/save-shipping-details')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="text" name="shipping_email" required placeholder="Email *">
                                                <input type="text" name="shipping_first_name" required placeholder="First Name *">
                                                <input type="text" name="shipping_last_name" required placeholder="Last Name *">
                                                <input type="text" name="shipping_address" required placeholder="Address *">
                                                <input type="text" name="shipping_mobile_number" required placeholder="Mobile Number *">
                                                <input type="text" name="shipping_city" required placeholder="City *">
                                                <input type="submit" class="btn btn-warning" value="Done">
                                          </form>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section> <!--/#cart_items-->
@endsection