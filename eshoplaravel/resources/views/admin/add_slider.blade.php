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
            <a href="{{URL::to('/add-slider')}}">Add Slider</a>
      </li>
</ul>

<div class="row-fluid sortable">
      <div class="box span12">
            <div class="box-header" data-original-title>
                  <h2><i class="halflings-icon edit"></i><span class="break"></span>Slider</h2>
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
                  <form class="form-horizontal" action="{{url('/save-slider')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                        
                        <div class="control-group">
                              <label class="control-label" for="image">Slider Image</label>
                              <div class="controls">
                                    <input class="input-file uniform_on" name="slider_image" id="slider_image" type="file" required>
                              </div>
                        </div> 
                        <div class="control-group hidden-phone">
                              <label class="control-label" for="publication_status">Publication status</label>
                              <div class="controls">
                                    <input type="checkbox" name="publication_status" value="1" checked required>
                              </div>
                        </div>
                        <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Add Slider</button>
                              <button type="reset" class="btn">Cancel</button>
                        </div>
                        </fieldset>
                  </form>   

            </div>
      </div><!--/span-->

</div><!--/row-->
@endsection()