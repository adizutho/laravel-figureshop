<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\products;
use App\ModelUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('admin_login')->with('alert', 'You have to login first!');
        }
        else{
            return view('admin.index');
        }
    }

    public function login(){
        return view('admin.login');
    }

    public function loginPost(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
            ]);
        
        $username = $request->username;
        $password = $request->password;

        $data = ModelUsers::where('username', $username)->first();
        if(@count($data) > 0){
            if(Hash::check($password, $data->password)){
                Session::put('name',$data->name);
                Session::put('username', $data->username);
                Session::put('login', TRUE);
                return redirect('admin_index');
            }
            else{
                return redirect('admin_login')->with('alert', 'Password salah!'.Hash::check($password, $data->password))->withInput();
            }
        }
        else{
            return redirect('admin_login')->with('alert', 'Username salah!')->withInput();
        }
    }

    public function logout(){
        Session::flush();
        return redirect('admin_login')->with('alert-success', 'You just logout');
    }

    public function profile(){
    	return view('admin.profile');
    }

    public function addproduct(){
    	return view('admin.addProduct');
    }

    public function saveproduct(Request $request){
    	$product_name = $request->product_name;
    	$product_code = $request->product_code;
    	$product_price = $request->product_price;
    	$product_description = $request->product_description;
        $category_id = $request->category_id;

    	if(isset($request->id)){
    		$id = $request->id;
    		$add_product = DB::table("products")->where('id', $id)
    		->update([
    			'product_name' => $product_name,
    			'product_code' => $product_code,
    			'product_price' => $product_price,
    			'product_description' => $product_description,
                //'category_id' => $category_id,
    			'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
    		]);
    	}else{
    		$add_product = DB::table("products")->insert([
    			'product_name' => $product_name,
    			'product_code' => $product_code,
    			'product_price' => $product_price,
    			'product_img' => "img.jpg",
    			'product_description' => $product_description,
                'category_id' => $category_id,
    			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
    		]);
    	}

    	if($add_product){
    		echo "done";
    	}
    	else{
    		echo "error";
    	}
    }

    public function uploadPP(Request $request){
    	$id = $request->id;
    	$data = products::findOrFail($id);
    	if(empty($request->file('product_img'))){
    		return redirect()->route('changeimg', ['id' => $id])->with('alert','Please choose an image!');
    	}
    	else{
            if($data->product_img != "img.jpg"){
                unlink('upload/prod_img/'.$data->product_img);
            }
    		$product_img = $request->file('product_img');
    		$filename = $product_img->getClientOriginalName();
    		$filename = time().$filename;
    		$path = 'upload/prod_img';
    		$product_img->move($path, $filename);

    		$update = DB::table('products')->where('id', $id)
    		->update([
    			'product_img' => $filename,
    			'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
    		]);

    		if($update){
    			return view('admin.editProduct', [
    				'data' => products::where('id', $id)->get()
    			]);
    		}
    		else{
    			echo 'error';
    		}
    	}
    }

    public function savecategory(Request $request){
    	$category_name = $request->category_name;

    	$add_category = DB::table("category")->insert([
			'category_name' => $category_name,
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		]);

		if($add_category){
    		echo "done";
    	}
    	else{
    		echo "error";
    	}
    }
}
