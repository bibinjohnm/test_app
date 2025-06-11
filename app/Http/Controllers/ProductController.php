<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    //

    public function getFilterProducts(Request $request){
       $search= $request->input('search');
       $price_min=$request->input('price_min');
       $price_max=$request->input('price_max');
         $date_from=$request->input('date_from');
         $date_to=$request->input('date_to');
         
       //  $products=ProductModel::query()
        return ProductModel::query()
         ->when($search,function($query,$search){
            return $query->where('productname','like',"%{$search}%")
                        ->orWhere('price','like',"%{$search}%");
         })

         ->when($price_min,function($query,$price_min){
            return $query->where('price','>=',$price_min);
         })

         ->when($price_max,function($query,$price_max){
            return $query->where('price','<=',$price_max);
         })
         ->when($date_from,function($query,$date_from){
            return $query->where('created_at','>=',$date_from);
         })
         ->when($date_to,function($query,$date_to){
            return $query->where('create_at','<=',$date_to);
         });    

         //$products->append(['search'=>$search]);

    }
     public function index(Request $request){
       // $products=ProductModel::all();
        //$products=ProductModel::paginate(5);

        //  $search = $request->input('search');
        //  $price_min=$request->input('price_min');
        //  $price_max=$request->input('price_max');
        //  $date_from=$request->input('date_from');
        //  $date_to=$request->input('date_to');
        //     $products = ProductModel::query()
        //     ->when($search, function ($query, $search) {
        //         return $query->where('productname', 'like', "%{$search}%")
        //                     ->orWhere('description', 'like', "%{$search}%")
        //                     ->orWhere('mrp','like',"%{$search}%");
        //     })

        //     ->when($price_min,function($query,$price_min){
        //         return $query->where('price','>=',$price_min);
        //     })
        //     ->when($price_max,function($query,$price_max){
        //         return $query->where('price','<=',$price_max);
        //     })
        //     ->when($date_from,function($query,$date_from){
        //         return $query->where('created_at','>=',$date_from);
        //     })
        //     ->when($date_to,function($query ,$date_to){
        //         return $query->where('created_at','<=',$date_to);
        //     })->paginate(5);

            // Append search query to pagination links

            $products=$this->getFilterProducts($request)->paginate(5);
            $products->appends($request->only(['search','price_min','price_max','date_from','date_to']));

            return view('admin.products.index',compact('products'));
            
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

    //update the product in db

    public function edit($id){
        $product=ProductModel::findorFail($id);
        return view('admin.products.updateProduct',compact('product'));
    }

    public function update(Request $request,$id){
        $validated = $request->validate([
            'productname'=>'required',
            'mrp'=>'required',
            'description'=>'required',
            'price'=>'required',
             // image is optional; only update if user uploads new one
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product=ProductModel::findorFail($id);
        $product->productname=$request->input('productname');
        $product->mrp=$request->input('mrp');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        
            // ✅ Handle file upload if new image is selected
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $product->image = $imageName;
            }
        $product->save();

        return redirect()->route('products.index')->with('success','product updated successfully');
    }

    // list product in users page

    public function listproduct(Request $request){
        $products=$this->getFilterProducts($request)->get();
        
        return view('listproduct',compact('products'));
    }

}
