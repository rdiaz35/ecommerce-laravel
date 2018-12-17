@extends('admin_layout')
@section('admin_content')

<div class="row-fluid sortable">
      <div class="box span6">
            <div class="box-header" data-original-title>
                  <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
            </div>
            <div class="box-content">
                  <table class="table table-striped">
                        <thead>
                              <tr>
                                    <th>Username</th>
                                    <th>Mobile</th>
                              </tr>
                        </thead>
                        <tbody>
                              <tr>
                                    <td>{{$order_by_id->customer_name}}</td>
                                    <td>{{$order_by_id->mobile_number}}</td>
                              </tr>
                        </tbody>
                  </table>
            </div>
      </div>
      <div class="box span6">
            <div class="box-header" data-original-title>
                  <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
            </div>
            <div class="box-content">
                  <table class="table table-striped">
                        <thead>
                              <tr>
                                    <th>Username</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                              </tr>
                        </thead>
                        <tbody>
                              <tr>
                                    <td>{{$order_by_id->shipping_first_name}}</td>
                                    <td>{{$order_by_id->shipping_address}}</td>
                                    <td>{{$order_by_id->shipping_mobile_number}}</td>
                                    <td>{{$order_by_id->shipping_email}}</td>
                              </tr>
                        </tbody>
                  </table>
            </div>
      </div>
</div>
<div class="row-fluid sortable">
      <div class="box span12">
            <div class="box-header" data-original-title>
                  <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
            </div>
            <div class="box-content">
                  <table class="table table-striped">
                        <thead>
                              <tr>
                                    <th>Id</th>
                                    <th>Product name</th>
                                    <th>Product price</th>
                                    <th>Product sales quantity</th>
                                    <th>Product sub total</th>
                              </tr>
                        </thead>
                        <tbody>
                              <?php foreach ($order_details_by_id as $v_order) {
                                    $product_id = $v_order->product_id;
                                    $product_name = $v_order->product_name;
                                    $product_price = $v_order->product_price;
                                    $product_sales_quantity = $v_order->product_sales_quantity;
                                    $subtotal = floatval($product_sales_quantity * $product_price);
                              ?>
                                    <tr>
                                          <td>{{$product_id}}</td>
                                          <td>{{$product_name}}</td>
                                          <td>{{$product_price}}</td>
                                          <td>{{$product_sales_quantity}}</td>
                                          <td>{{floatval($subtotal)}}</td>
                                    </tr>
                              <?php }?>
                        </tbody>
                        <tfoot>
                              <tr>
                                    <td colspan="4">Total: </td>
                                    <td><strong>{{$order_by_id->order_total}}</strong></td>
                              </tr>
                        </tfoot>
                  </table>
            </div>
      </div>
</div>

@endsection()