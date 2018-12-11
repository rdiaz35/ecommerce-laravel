@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
      <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i> 
      </li>
      <li>
            <i class="icon-edit"></i>
            <a href="{{URL::to('/add-category')}}">Add category</a>
      </li>
</ul>

<div class="row-fluid sortable">
      <div class="box span12">
            <div class="box-header" data-original-title>
                  <h2><i class="halflings-icon edit"></i><span class="break"></span>Category</h2>
            </div>
            <p class="alert-success">
                  <?php
                        $message = Session::get('message');
                        if ($message) {
                              echo $message;
                              Session::put('message', NULL);
                        }
                  ?>      
            </p>      
            <div class="box-content">
                  <form class="form-horizontal" action="{{url('/save-category')}}" method="post">
                        {{ csrf_field() }}
                        <fieldset>
                        <div class="control-group">
                              <label class="control-label" for="category_name">Category Name</label>
                              <div class="controls">
                                    <input type="text" class="input-xlarge" name="category_name">
                              </div>
                        </div>
                        <div class="control-group hidden-phone">
                              <label class="control-label" for="category_description">Category description</label>
                              <div class="controls">
                                    <textarea class="input-xlarge" name="category_description" rows="3"></textarea>
                              </div>
                        </div>
                        <div class="control-group hidden-phone">
                              <label class="control-label" for="publication_status">Publication status</label>
                              <div class="controls">
                                    <input type="checkbox" name="publication_status" value="1" checked>
                              </div>
                        </div>
                        <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Add Category</button>
                              <button type="reset" class="btn">Cancel</button>
                        </div>
                        </fieldset>
                  </form>   

            </div>
      </div><!--/span-->

</div><!--/row-->
@endsection()