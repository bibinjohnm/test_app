@extends('layouts.app')
@section('main')
    <div class="col-md-6">
        <form action="{{route('products.store')}}"  method="POST" enctype="multipart/form-data" >
           @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="sno" class="form-label">S.No</label>
                    <input type="text" name="sno" id="sno" class="form-control" placeholder="Enter the S.No">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="productname" class="form-label">Product Name </label>
                    <input type="text" name="productname" id="productname" class="form-control" placeholder="Enter the Product Name">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea for="description" name="description" class="form-control"></textarea>
                </div> 
                <div class="col-md-12 mb-3">
                    <label for="mrp" class="form-label">MRP</label>
                    <input type="text" name="mrp" id="mrp" class="form-control" placeholder="Enter MRP">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>  
                <div class ="col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary">Add Product </button>
                </div>         
            </div>
        </form>

     @if (session('success'))
                    <!-- Success Modal -->
                    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title" id="successModalLabel">Success</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ session('success') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Auto-show modal on page load -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                            successModal.show();
                        });
                    </script>
    @endif

    </div>
@endsection