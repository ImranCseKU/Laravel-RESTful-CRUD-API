<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // return $products;
        $response = APIHelpers::createAPIResponse(false, 200, '', $products);
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $res = $product->save();

        if($res){
            //status code = 201 for create a new Record
            $response = APIHelpers::createAPIResponse(false, 201, 'Product Added successfully', null);
            return response()->json($response);
        }
        else{
            //status code = 400 for Bad Request
            $response = APIHelpers::createAPIResponse(false, 400, 'Product Creation Failed', null);
            return response()->json($response, 400);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        // return $product;
        $response = APIHelpers::createAPIResponse(false, 200, '', $product);
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $res = $product->save();

        if($res){
            $response = APIHelpers::createAPIResponse(false, 200, 'Product updated successfully', null);
            return response()->json($response);
        }
        else{
            $response = APIHelpers::createAPIResponse(false, 400, 'Product update failed', null);
            return response()->json($response, 400);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $res = $product->delete();

        if($res){
            $response = APIHelpers::createAPIResponse(false, 200, 'Product deleted successfully', null);
            return response()->json($response);
        }
        else{
            $response = APIHelpers::createAPIResponse(false, 400, 'Product delete failed', null);
            return response()->json($response, 400);
        }
    }
}
