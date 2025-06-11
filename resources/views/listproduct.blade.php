@extends('layouts.app')

@section('main')
 
    <div class="row">
        <div class="d-flex justify-content-between">
            <h5>List of Products </h5>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>MRP</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index=> $product)
                <tr>
                    <td>{{$index+1}}.</td>
                    <td><img src="{{ asset('images/' . $product->image) }}" width="50" height="50"></td>
                    <td>{{$product->productname}}</td>
                    <td>Rs.{{$product->mrp}}</td>
                    <td>Rs.{{$product->price}}</td>
                    <td><a href="#" class="btn btn-dark"><i class="bi bi-pencil-square"></i> </a>
                    <a href ="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
