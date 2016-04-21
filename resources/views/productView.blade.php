@extends('layouts.base')

@section('body')
<div class="row">
	<div class="col-md-6">
		<div class="box box-danger">
			<div class="box-header">
				<i class="fa fa-reorder"></i>
				<div class="box-title">
					<h4>Item:&nbsp;<strong>{{$product->name}}</strong></h4>
				</div>
				
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-4">
						<div class="pull-left image">
							<img src="{{URL::asset('dist/img/boxed-bg.jpg')}}" style="max-height:100%;max-width:100%;">
						</div>
					</div>
					<div class="col-md-8">
						<ul>
							<li><h5>Price:&nbsp;<strong>{{$product->price}}</strong></h5></li>
							<li>Weight:&nbsp;{{$product->weight}}</li>
							<li>Category:&nbsp;{{$product->category}}</li>
							<li>Brand:&nbsp;{{$product->brand}}</li>
							<li>Description:&nbsp;{{$product->description}}</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<p>Created at:&nbsp;{{$product->created_at}}&nbsp;Updated at:&nbsp;{{$product->updated_at}}</p>
			</div>
		</div>
	</div>
</div>
@stop