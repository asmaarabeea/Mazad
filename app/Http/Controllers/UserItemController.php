<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\Product;
use App\User;

class UserItemController extends Controller
{
	public function index()
    {
        $products = Product::where("user_id" , Auth::id())->get();
        return view('myitem', ['products' => $products]);
    }

    public function show($id){
        if(Auth::id()){
        	return redirect("/myitem");
        }
        
        $products = Product::find($id);
        return view('itemDetails', compact('products'));
    }

    public function getAllProduct(){
        $products = Product::all();
        return view('homepage', compact('products'));
    }

    function store(Request $request){
    	$product = new Product;
        if($request->saveItem){
            $this->validate($request,[
            'productName' => 'required',
            'price' => 'required',
            'product_desc' => 'required',
            'image' => 'required',
            ]);

        	$product->product_img = $request->get("img");
        	$product->productName = $request->get("productName");
        	$product->price = $request->get("price");
        	$product->product_img = $request->file('image')->store('images');

        	// $product->online = $request->get("online");
        	if ($request->get('online') == null) {
        		$product->online = false;
        	} else{
        		$product->online = true;
        	}

        	$product->product_desc = $request->get("product_desc");
        	if($request->get("highest_bid") == null){
                $product->highest_bid = 0;    
            }else{
                $product->highest_bid = $request->get("highest_bid");
            }
            if($request->get("no_of_bid") == null){
               $product->no_of_bid = 0; 
            } else{
                $product->no_of_bid = $request->get("no_of_bid");
            }
        	$product->user_id = Auth::id();

        	$product->save();
            return redirect("myitem");
        }
        else{
            return redirect("myitem");   
        }
    }	

    public function sendEmail_updateProducts(Request $request, $pid){

        $products = Product::find($pid);
        
        if($products->price < $request->input("bidEdit")){
            $products->highest_bid = $request->input("bidEdit");
            $products->price = $request->input("bidEdit");
            $products->no_of_bid++;
            $products->save();

            $data['name'] = "Your Item has been Bid";
            $data['bodyMessage'] = "Your Item has been bid";
            Mail::send('product.contact',$data, function($message) use($data) {
                $message->from("amr_zabest_2015@yahoo.com", "Asmaa Rabeea");
                $message->to("asmaa.rabeea7@gmail.com");
                $message->subject($data['name']);
            });
        } else{
            return back();
        }


        return view("itemDetails", compact('products'));
	// Session::flash('success', 'Your email was sent');
    // return redirect('/{pid}');
    }

    public function myItems(){
        $items=Product::where("user_id", Auth::id())->get();
        return view("myitem",compact('items'));
    }

    public function addItem(){
        return view("additem");
    }

    public function editItem($pid)
        {

            $product= Product::find($pid);

            return view('edititem',compact('product'));
        
        }

    public function updateItem(Request $request,$pid)
    {
        $product = Product::find($pid);
        if($request->saveItem){
            
            $this->validate($request,[
            'productName' => 'required',
            'price' => 'required',
            'product_desc' => 'required',
            ]);

           $product->productName = $request->get("productName");
           $product->price= $request->get("price");
           
           if ($request->get('online') == null) {
                $product->online = false;
            } else{
                $product->online = true;
            }

           $product->product_desc = $request->get("product_desc");
           if ($request->file("image")) {
               $product->product_img = $request->file('image')->store('images');
           }
           $product->save();
           return redirect('myitem');
        } else{
            return redirect('myitem');
        }

    }

    public function deleteItems($pid){
        $product=Product::find($pid);
        $product->delete();
        return back();
    }
    

}