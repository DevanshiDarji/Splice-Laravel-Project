<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Product as ProductResource;

class CustomizedProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$products = Product::all()->map(function ($product) {
            $productArray = $product->toArray();
            $productArray['image_url'] = asset('storage/' . $product->image);
            return $productArray;
        });

        return response()->json($products);*/
        $products = Product::all();
       // return response()->json($products);
        return $this->sendResponse(ProductResource::collection($products), 'Products Retrieved Successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
    }
    public function store(Request $request)
    {
        /*$user = Auth::user();

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->image = $request->file('image')->store('public/images');
        $product->user_id = $user->id;
        $product->save();

        return response()->json(['success' => true, 'message' => 'Product created successfully'], 201);*/

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'quantity' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $product = Product::create($input);
   
        return $this->sendResponse(new ProductResource($product), 'Product Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
  
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
   
        return $this->sendResponse(new ProductResource($product), 'Product Retrieved Successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$product = Product::find($id);
  
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
   
        return $this->sendResponse(new ProductResource($product), 'Product Retrieved Successfully.');*/

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'quantity' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $product = Product::find($id);   
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->price = $input['price'];
        $product->image = $input['image'];
        $product->quantity = $input['quantity'];
        $product->save();
   
        return $this->sendResponse(new ProductResource($product), 'Product Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
   
        return $this->sendResponse([], 'Product Deleted Successfully.');
    }
}
