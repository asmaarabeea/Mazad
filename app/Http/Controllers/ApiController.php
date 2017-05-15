<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ApiController extends Controller
{
    function index() {
    	$items = Product::all();
    	return response()->json($items, 200);
    }

    function show($id) {
    	$item = Product::find($id);
    	return response()->json($item, 200);
    }

    function bidding(Request $request, $id) {
    	$item = Product::find($id);

    	if ($request->bid_price > $item->highest_bid) {
    		$item->highest_bid = $request->bid_price;
    	}
    	$item->no_of_bid++;
    	$item->save();
    	return response()->json(['success' => true]);
    }
}
