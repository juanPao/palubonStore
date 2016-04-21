@extends('layouts.base')
@section('body')
<div class="row">
	<div class="col-md-7">
		
			<div class="box box-solid-green">
				<div class="box-header">
					<div class="box-title">View Product</div>
				</div>
				<form method="POST" action="{{url('product/edit')}}" class="form-horizontal">
				<input type="hidden" value="{{ csrf_token() }}" name="_token"/>
				<input type="hidden" value="{{$product->id}}" name="id"/>
				<div class="box-body">
				
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Product Image:</label>
						<div class="col-sm-8">
							<img src="{{asset('uploads/products/'.$product->id.$product->image)}}" class="img-responsive" style="max-height:200px;max-width:100%;">
							
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Product Name:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" placeholder="Product Name.." disabled="disabled"/>
						</div>
					</div>
					<div class="form-group">
						<label for="price" class="col-sm-4 control-label">Product Price:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="price" id="price" value="{{$product->price}}" placeholder="Product Price.." disabled="disabled"/>
						</div>
					</div>
					<div class="form-group">
						<label for="weight" class="col-sm-4 control-label">Product Weight:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="weight" id="weight" value="{{$product->weight}}" placeholder="Product weight.." disabled="disabled"/>
						</div>
					</div>
					<div class="form-group">
						<label for="brand" class="col-sm-4 control-label">Product Brand:</label>
						<div class="col-sm-8">
							<label>{{$product->brand}}</label>
						</div>
					</div>
					<div class="form-group">
						<label for="category" class="col-sm-4 control-label">Product Category:</label>
						<div class="col-sm-8">
							<label>{{$product->brand}}</label>
						</div>
					</div>
					<div class="form-group">
						<label for="description" class="col-sm-4 control-label">Product Description:</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="description" name="description" disabled="disabled">{{$product->description}}</textarea>
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label for="date" class="col-sm-4 control-label">Date Added/Updated</label>
						<div class="col-sm-8">
							<small>Date Created:</small>
								<strong>{{$product->created_at}}</strong>&nbsp;
							<small>Last Updated:</small>
								<strong>{{$product->updated_at}}</strong>
						</div>
					</div>
					<div class="form-group">
						<label for="user" class="col-sm-4 control-label">User:</label>
						<div class="col-sm-8">
							<input type="text" name="user" id="user" class="form-control" value="{{$product->user}}" disabled="disabled"/>
						</div>
					</div>
				
				</div>
				<div class="box-footer">
					<div class="pull-right">
						<a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
						<a href="{{url('product/edit/'.$product->id)}}" class="btn btn-info">Edit</a>
					</div>
				</div>
				</form>
			</div>
		
	</div>
	
</div>
@stop