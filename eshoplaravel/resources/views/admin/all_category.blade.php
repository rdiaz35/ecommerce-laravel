@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
      <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
      </li>
      <li><a href="#">All Category</a></li>
</ul>
<p class="alert-success">
      <?php
            $message = Session::get('message');
            if ($message) {
                  echo $message;
                  Session::put('message', NULL);
            }
      ?>      
</p>
<div class="row-fluid sortable">		
      <div class="box span12">
            <div class="box-header" data-original-title>
                  <h2><i class="halflings-icon user"></i><span class="break"></span>Category</h2>
            </div>
            <div class="box-content">
                  <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                              <tr>
                                    <th>Category Id</th>
                                    <th>Category name</th>
                                    <th>Category description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                              </tr>
                        </thead>
                        @foreach ($all_category_info as $v_cate)
                        <tbody>                        
                              <tr>
                                    <td>{{ $v_cate->category_id }}</td>
                                    <td class="center">{{ $v_cate->category_name }}</td>
                                    <td class="center">{{ $v_cate->category_description }}</td>
                                    <td class="center">
                                          @if($v_cate->publication_status == 1)
                                          <span class="label label-success">Active</span>
                                          @else
                                          <span class="label label-danger">Unactive</span>
                                          @endif
                                    </td>
                                    <td class="center">
                                          @if($v_cate->publication_status==1)
                                                <a class="btn btn-danger" href="{{URL::to('/unactive_category/'.$v_cate->category_id)}}">
                                                      <i class="halflings-icon white thumbs-down"></i>                                            
                                                </a>
                                          @else
                                                <a class="btn btn-success" href="{{URL::to('/active_category/'.$v_cate->category_id)}}">
                                                      <i class="halflings-icon white thumbs-up"></i>                                            
                                                </a>
                                          @endif
                                          <a class="btn btn-info" href="{{URL::to('/edit-category/'.$v_cate->category_id)}}">
                                                <i class="halflings-icon white edit"></i>                                            
                                          </a>
                                          <a class="btn btn-danger" href="{{URL::to('/delete-category/'.$v_cate->category_id)}}" id="delete">
                                                <i class="halflings-icon white trash"></i> 
                                                
                                          </a>
                                    </td>
                              </tr>
                        </tbody>
                        @endforeach 
                  </table>            
            </div>
      </div><!--/span-->
</div><!--/row-->
@endsection()