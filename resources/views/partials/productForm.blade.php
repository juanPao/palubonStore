<div class="form-group">
	<label for="name" class="col-sm-4 control-label">Product Image:</label>
	<div class="col-sm-8">
		<img src="{{asset('uploads/products/'.$product->id.$product->image)}}" class="img-responsive" style="max-height:200px;max-width:100%;">
		<small>Change</small><input type="file" name="image" id="image" class="form-control"/>
	</div>
</div>
<div class="form-group">
	<label for="name" class="col-sm-4 control-label">Product Name:</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" placeholder="Product Name.."/>
	</div>
</div>
<div class="form-group">
	<label for="price" class="col-sm-4 control-label">Product Price:</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="price" id="price" value="{{$product->price}}" placeholder="Product Price.."/>
	</div>
</div>
<div class="form-group">
	<label for="weight" class="col-sm-4 control-label">Product Weight:</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="weight" id="weight" value="{{$product->weight}}" placeholder="Product weight.."/>
	</div>
</div>
<div class="form-group">
	<label for="brand" class="col-sm-4 control-label">Product Brand:</label>
	<div class="col-sm-8">
		<select name="brand" id="brand" class="form-control select2">
			<option value="{{$product->brand}}">{{$product->brand}}</option>
			@foreach($brands as $brand)
				<option value="{{$brand->name}}">{{$brand->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="form-group">
	<label for="category" class="col-sm-4 control-label">Product Category:</label>
	<div class="col-sm-8">
		<select name="category" id="category" class="form-control select2">
			<option  value="{{$product->category}}">{{$product->category}}</option>
			@foreach($categories as $category)
				<option value="{{$category->name}}">{{$category->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="form-group">
	<label for="description" class="col-sm-4 control-label">Product Description:</label>
	<div class="col-sm-8">
		<textarea class="form-control" id="description" name="description">{{$product->description}}</textarea>
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