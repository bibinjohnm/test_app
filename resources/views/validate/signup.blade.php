@extends('layouts.app')
@section('main')
     <div class="col-md-6 mt-5">
        <form action="/validate/store" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label"> Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Enter your Name">
                    </div> 
                </div>
                 <div class="row mb-3">
                     <div class="col-md-12">
                        <label class="form-label">Phone No</label>
                        <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="Phone No">
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
                        <label class="form-label">DOB</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date of birth">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Enter your Age">
                    </div>
                 </div>
                 <div class="row mb-3">
                    <div class="col-md-6">
                        <button type="submit" onclick="confirmInsert()" name="action" value="signup" class="btn btn-primary"> Submit / Signup</button>
                    </div>                      
                 </div>
        </form>      
                 <div class="row mb-3">
                     <div class="col-md-6">
                        <a href="{{ route('login') }}">Login and get in</a>
                    </div>
                 </div>   
                    <script>
                        function confirmInsert() {
                        return confirm("Are you sure you want to insert this record?");
                        }
                    </script>  
                <!-- for success message -->
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
            

          
            
       