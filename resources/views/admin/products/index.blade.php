
@extends('layouts.app')
@section('main')
        
    
        <div class="row">
                <div class="d-flex justify-content-between">
                    <h5><i class="bi bi-bag-check-fill"></i>Product Details</h5>
                    <a href="productAdd" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                    New Product</a>
                </div> 
                <div class="col-md-12 table-responsive mt-3">
                    <div class="d-flex justify-content-end">
                        <form method="GET" action="{{ route('products.index') }}" class="row mb-4 g-2">

                                <!-- Search -->
                                <div class="col-md-3">
                                    <input type="text" name="search" class="form-control" placeholder="Search product..." value="{{ $search ?? '' }}">
                                </div>

                                <!-- Price Range -->
                                <div class="col-md-2">
                                    <input type="number" name="price_min" class="form-control" placeholder="Min Price" value="{{ $price_min ?? '' }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="price_max" class="form-control" placeholder="Max Price" value="{{ $price_max ?? '' }}">
                                </div>

                                <!-- Date Range -->
                                <div class="col-md-2">
                                    <input type="date" name="date_from" class="form-control" value="{{ $date_from ?? '' }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="date_to" class="form-control" value="{{ $date_to ?? '' }}">
                                </div>

                                <!-- Buttons -->
                                <div class="col-md-1 d-grid">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                        </form>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>MRP</th>
                                <th>Selling</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index=>$product)
                            <tr>
                                <td>{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}.</td>
                                <td><img src="{{ asset('images/' . $product->image) }}" width="60" height="60"></td>
                                <td>{{$product->productname}}</td>
                                <td>Rs.{{$product->mrp}}/-</td>
                                <td>Rs.{{$product->price}}/-</td>
                                <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                       
                    </table>
                </div> 

                  <!-- Pagination links -->
            <div class="mt-0 ">
                {{$products->links('pagination::bootstrap-5')}}
            </div>
            
        </div>
           
            
       
       

           @endsection

