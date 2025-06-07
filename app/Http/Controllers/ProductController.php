<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    //
     public function index(Request $request){
       // $products=ProductModel::all();
        //$products=ProductModel::paginate(5);

         $search = $request->input('search');
            $products = ProductModel::when($search, function ($query, $search) {
                return $query->where('productname', 'like', "%{$search}%")
                            ->orWhere('description', 'like', "%{$search}%")
                            ->orWhere('mrp','like',"%{$search}%");
            })->paginate(5);

            // Append search query to pagination links
            $products->appends(['search' => $search]);
         return view('admin.products.index',compact('products','search'));
    }
    public function productAdd(){
        return view('admin.products.productAdd');
    }

    public function store(Request $request){

        $validated=$request->validate(
            [
                'productname'=>'required',
                'description'=>'required',
                'mrp'=>'required',
                'price'=>'required',
                'image'=>'required',
            ]
            );
            // Handle the uploaded image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName); // Save to public/images

        // Replace 'image' in validated data with the filename
        $validated['image'] = $imageName;
    }

    // Save the product to the database
   
        ProductModel::create($validated);
        return redirect()->back()->with('success','Product Data Inserted');
    }

}
