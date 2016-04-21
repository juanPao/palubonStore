@extends('layouts.base')

@section('styles')
<style type="text/css">

</style>
@stop

@section('body')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
			<div class="box-header">
				<div class="box-title">
					
				</div>
				<strong>View:&nbsp;</strong>
				<a href="{{url('home/grid')}}" class="btn btn-flat btn-default @if(url()->current()==url('home/grid')) active @endif"><i class="fa fa-navicon"></i></a>
				<a href="{{url('home/table')}}" class="btn btn-flat btn-default @if(url()->current()==url('home/table')) active @endif"><i class="fa fa-table"></i></a>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="box-body">

			@if(session()->get('user'))
			<div class="col-sm-4">
				<button class="btn btn-flat btn-default" data-toggle="modal" data-target="#productModal">Add Product</button>
				<button class="btn btn-flat btn-default" data-toggle="modal" data-target="#brandModal">Add Brand</button>
				<button class="btn btn-flat btn-default" data-toggle="modal" data-target="#categoryModal">Add Category</button>
			</div>
			@endif
			<div class="col-sm-5">
				<div class="input-group">
	                    <input type="text" class="form-control">
	                    <span class="input-group-btn">
	                      <button class="btn btn-info btn-flat" type="button">Search</button>
	                    </span>
	            </div>
			</div>
				
			</div>
			<div class="box-footer">
				
			</div>
		</div>
	</div>
</div>
@if(url()->current()===url('home') OR url()->current()===url('home/table'))
<div class="box">
	<div class="box-header">
		<div class="box-title">
			<i class="fa fa-bars"></i>&nbsp;<strong>List of Products</strong>
		</div>
		
	</div>
	<div class="box-body table-responsive no-padding">
		<table class="table table-hover" id="myTable">
			
			<thead>
				<tr>
					<th></th>
					<th>Product Number</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Brand</th>
					<th>Category</th>
					<th>Weight</th>
					<th>Last Update</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($products as $product)
						<tr>
							<td><a href="{{url('product/view/'.$product->id)}}" class="btn btn-xs btn-success">View</a></td>
							<td><!-- <a href="{{url('product/'.$product->id)}}" class="lable lable-success"> -->{{$product->product_num}}</a></td>
							<td>{{$product->name}}</td>
							<td>{{$product->price}}</td>
							<td>{{$product->brand}}</td>
							<td>{{$product->category}}</td>
							<td>{{$product->weight}}</td>
							<td>{{$product->updated_at}}</td>
							<td>@if(session()->get('user'))<a href="{{url('product/edit/'.$product->id)}}" class="btn btn-xs btn-info">Edit</a><a href="{{url('product/delete/'.$product->id)}}"class="btn btn-xs btn-danger">Del</a>@endif</td>
						</tr>
				@endforeach
			</tbody>
		</table>
		
		
	</div>
</div>
@elseif(url()->current()===url('home/grid'))
<div class="row">
	<div class="col-md-12">

	<div class="box box-default">
		<div class="box-header">
			<div class="box-title"><strong>List of Products:</strong></div>
		</div>
		<div class="box-body">
		<p>Grid View:</p>
			@foreach($products as $product)
				<div class="col-md-2">
					<img class="img-thumbnail" src="{{asset('uploads/products/'.$product->id.$product->image)}}" style="max-height:150px;max-width:100%;width:100%;"/>
					<div class="form-group">
						<ul class="list-unstyled">
							<li><small>Name:&nbsp;</small><strong>{{$product->name}}</strong></li>
							<li><smaill>Price:&nbsp;</smaill><strong>{{$product->price}}</strong></li>
							<li><a class="btn btn-block btn-xs btn-success" href="{{url('product/view/'.$product->id)}}">View</a><a class="btn btn-xs btn-block btn-info" href="{{url('product/edit/'.$product->id)}}">Edit</a></li>
						</ul>
					</div>
				</div>
			@endforeach
			
		</div>
	</div>
	</div>
</div>
@endif

<!-- Modal for Add Product-->
  <div class="modal fade" id="productModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a Product</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{url('product/add')}}" class="form-horizontal" enctype="multipart/form-data">
          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Product Name..">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPrice" class="col-sm-2 control-label">Price</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputPrice" name="price" placeholder="Price..">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="selectBrand" class="col-sm-2 control-label">Brand</label>
                      <div class="col-sm-10">
                      	<select class="form-control select2" id="selectBrand" name="brand">
                      		<option disabled="disabled">Select..</option>
                      		@foreach($brands as $brand)
                      			<option>{{$brand->name}}</option>
                      		@endforeach
                      	</select>
                      </div>
                    </div>

                    <div class="form-group">
                    	<label for="selectCategory" class="col-sm-2 control-label">Category</label>
                    	<div class="col-sm-10">
                    		<select class="form-control select2" id="selectCategory" name="category">
                    			<option disabled="disabled">Select..</option>
                    			@foreach($categories as $category)
                    				<option>{{$category->name}}</option>
                    			@endforeach
                    		</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label for="inputWeight" class="col-sm-2 control-label" >Weight</label>
                    	<div class="col-sm-10">
                    		<input type="text" class="form-control" id="inputWeight" name="weight" placeholder="Weight with unit.."/>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label for="inputDescription" class="col-sm-2 control-label">Description</label>
                    	<div class="col-sm-10">
                    		<textarea class="form-control" name="description" id="inputDescription" placeholder="Description.."></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label for="inputImage" class="col-sm-2 control-label">Image</label>
                    	<div class="col-sm-10">
                    		<input class="form-control" type="file" id="inputFile" name="image"/>
                    	</div>
                    </div>
                  </div><!-- /.box-body -->
             
                
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary pull-right" name="submit" />
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal for Add brand-->
  <div class="modal fade" id="brandModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a Brand</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{url('product/brand')}}" class="form-horizontal" enctype="multipart/form-data">
          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                  @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Brand Name..">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPrice" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="description"></textarea>
                      </div>
                    </div>
                    
                  </div><!-- /.box-body -->
             
                
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary pull-right" name="submit" />
        </div>
        </form>
      </div>
      
    </div>
  </div>
  </div>

<!-- Modal for Add category-->
  <div class="modal fade" id="categoryModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a Category</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{url('product/category')}}" class="form-horizontal" enctype="multipart/form-data">
          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                  @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Category Name..">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPrice" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="description"></textarea>
                      </div>
                    </div>
                    
                  </div><!-- /.box-body -->
             
                
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary pull-right" name="submit" />
        </div>
        </form>
      </div>
      
    </div>
  </div>
  </div>


<!-- Modal for Add View-->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <img style="max-height:300px;width:100%;padding:25px;" class="img-responsive img-thumbnail" src="{{asset('uploads/products/30.jpg')}}">
          </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" name="name" placeholder="Category Name..">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPrice" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description"></textarea>
                </div>
              </div>
              
            </div><!-- /.box-body -->
        </form>
                
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
@stop

@section('scripts')

<script type="text/javascript">
$(function () {
 	$('.select2').select2();
});
</script>
@stop