<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Http\Requests;
use DB;
class homeController extends Controller
{
    //
    public function __construct()
    {
    	if(!session()->get('user'))
    	{
    		
    	}

    }

    public function index()
    {
    	$product = Product::all();

    	$data['user'] = session()->get('user');

    	$data['products'] = $product;

    	$data['brands'] = DB::select('SELECT * FROM `product_brands`');
    	$data['categories'] = DB::select('SELECT * FROM `product_category`');

    	$data['title'] = \Config::get('constants.OWNER_NAME');

    	return view('homeView', $data);
    }


}
