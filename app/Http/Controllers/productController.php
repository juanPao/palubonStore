<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Http\Requests;
use App\Brand;
use App\Category;
class productController extends Controller
{
    //
    public function __construct(){
    	if(!session()->get('user'))
    	{
    		return redirect('home');
    	}
    }
    public function destroy($id)
    {
    	$product = Product::findOrfail($id);
    	$product->delete();
    	return redirect('home');

    }

    public function show($id)
    {
        $product = Product::findOrfail($id);
        $data['product'] = $product;
        return view('productDisplayView', $data);
    }
    public function edit($id)
    {
    	$product = Product::findOrFail($id);
    	$data['product'] = $product;
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
    	return view('productEdit',$data);
    }

    public function editPost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required|numeric',

            ]);
        $product = Product::findOrfail($request->id);
        $product->name = $request->name;
        $product->price= $request->price;
        $product->weight = $request->weight;
        $product->brand = $request->brand;
        $product->category = $request->category;
        $product->description = $request->description;
        if($request->hasFile('image'))
            {
           
                $imageName = $product->id.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(
                    base_path() . '/public/uploads/products', $imageName
                );
            }
        if($product->save())
        {
            return redirect('home');
        }
        
    }

    public function productPost(Request $request)
    {
        $product = new Product;
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            ]);
       

        //$product->product_num
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->brand = $request->input('brand');
        $product->category = $request->input('category');
        $product->weight = $request->input('weight');
        $product->description = $request->input('description');
        $product->user = session()->get('user');
        if($request->hasFile('image'))
        {
             $product->image = '.'.$request->file('image')->getClientOriginalExtension();
        }
       
        if($product->save())
        {
            
            if($request->hasFile('image'))
            {
           
                $imageName = $product->id.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(
                    base_path() . '/public/uploads/products', $imageName
                );
            }
            return redirect('home');
        }
        
        
    }
    public function brandPost(Request $request)
    {
        $brand = new Brand;
        $this->validate($request,[
            'name'=>'required',
            ]);

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->user = session()->get('user');
        if($brand->save())
        {
            return redirect('home');
        }

    }
    public function categoryPost(Request $request)
    {
        $category = new Category;
        $this->validate($request,[
            'name'=>'required',
            ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->user = session()->get('user');
        if($category->save())
        {
            return redirect('home');
        }
    }
 }
