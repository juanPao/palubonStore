@extends('layouts.base')
@section('body')
<div class="row">
	<div class="col-md-7">
		
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
			<div class="box box-solid-green">
				<div class="box-header">
					<div class="box-title">Edit Product</div>
				</div>
				<form method="POST" action="{{url('product/edit')}}" class="form-horizontal">
				<input type="hidden" value="{{ csrf_token() }}" name="_token"/>
				<input type="hidden" value="{{$product->id}}" name="id"/>
				<div class="box-body">
				
					@include('partials.productForm')
				
				</div>
				<div class="box-footer">
					<div class="pull-right">
						<a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
						<input type="submit" class="btn btn-info" name="submit" value="Submit"/>
					</div>
				</div>
				</form>
			</div>
		
	</div>
	
</div>
@stop