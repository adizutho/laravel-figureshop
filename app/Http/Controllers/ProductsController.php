<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\products;

class ProductsController extends Controller
{
	public function index(){
		$data = DB::table('products')
		->take(3)->orderBy('id', 'desc')
		->get();

		return view('front.index', [
			'data' => $data
		]);
	}

    public function prodcategory(Request $request){
    	$category = $request->categories;

    	$data = DB::table('products')
    	->join('category', 'category.id', 'products.category_id')
    	->where('category.category_name', $category)
    	->get();

    	return view('front.products', [
    		'data' => $data,
    		'category_name' => $category,
    		'search' => 'false'
    	]);
    }

    public function searchprod(Request $request){
    	$searchData =  $request->searchData;

    	$data = DB::table('products')
    	->join('category', 'category.id', 'products.category_id')
    	->where('products.product_name', 'like', '%' . $searchData . '%')
    	->get();

    	return view('front.products', [
    		'data' => $data,
    		'category_name' => $searchData,
    		'search' => 'true'
    	]);
    }

    public function prodcategory_dropdown(Request $request){
    	$category_id = $request->category_id;
    	$price = $request->price;

    	if($category_id != "null" && $price != "null"){
    		$data = DB::table('products')
	    	->join('category', 'category.id', 'products.category_id')
	    	->where('products.category_id', $category_id)
	    	->orderBy('products.product_price', $price)
	    	->get();
    	}
    	else if($category_id != "null" && $price == "null"){
    		$data = DB::table('products')
	    	->join('category', 'category.id', 'products.category_id')
	    	->where('products.category_id', $category_id)
	    	->get();
    	}
    	else if($category_id == "null" && $price != "null"){
    		$data = DB::table('products')
	    	//->join('category', 'category.id', 'products.category_id')
	    	->orderBy('product_price', $price)
	    	->get();
    	}

    	if(count($data) == "0"){
			echo "<div class='col-md-12' align='center'>
			    			<h1 align='center' style='margin: 20px;'>No Products is found!</h1>
			    		</div>";
    	}
    	else{
    		return view('front.productsAjax', [
	    		'data' => $data,
	    		'search' => 'false'
	    	]);
    	}
    }
}
