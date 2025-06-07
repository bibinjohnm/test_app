<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
        </head>
    <body>
         <nav class="navbar navbar-expand bg-black">
            <div class="container-fluid">
                <a href="#" class="navbar-brand text-light">Laravel Signup</a>
            </div>
        </nav>

        <div class="container mt-5">
           <div class="row">
                <h5><i class="bi bi-plus-square-fill"></i> Add New Product</h5>
                <hr />
            </div>
            <!-- breadcrumb -->
            <div class="breadcrumb-wrapper" style="width: fit-content;">
                <nav class="my-3 ">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Signup</li>
                    <li class="breadcrumb-item active"><a href="#">login</a></li>
                </ol>
            </nav>
            <hr/>
            </div>
            @yield('main')

             </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>      
</html>