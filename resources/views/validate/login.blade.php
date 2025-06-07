@extends('layouts.app');
@section('main');

    <div class="col-md-6 mt-5">
        <form action="{{ route('login.check') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label"> Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Enter your Name">
                    </div> 
                </div>
                 

                 <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                 </div>
                
                 <div class="row mb-3">
                    
                     <div class="col-md-6">
                        <button type="submit" class="btn btn-success"> Login and get in</button>
                    </div>
                        
                 </div>

        </form>     
        
        <!-- show message -->
         @if (session('status'))
        <!-- Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="errorModalLabel">Login Error</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('status') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trigger modal on page load -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            });
        </script>
    @endif
    </div>
                
@endsection;