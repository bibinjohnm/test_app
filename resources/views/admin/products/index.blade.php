
@extends('layouts.app')
@section('main')
        
        
           <div class="row">
                <div class="d-flex justify-content-between">
                    <h5><i class="bi bi-bag-check-fill"></i>Product Details</h5>
                    <a href="productAdd" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                    New Product</a>
                </div> 
                <div class="col-md-12 table-responsive mt-3">
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
                                <td>{{$index+1}}.</td>
                                <td><img src="{{ asset('images/' . $product->image) }}" width="60" height="60"></td>
                                <td>{{$product->productname}}</td>
                                <td>Rs.{{$product->mrp}}/-</td>
                                <td>Rs.{{$product->price}}/-</td>
                                <td><a href="productAdd" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>

                    </table>
                </div> 
           </div>
           


       

           @endsection


