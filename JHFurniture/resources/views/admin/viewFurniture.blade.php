<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Furniture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
        <div class="row justify-content-start">
            <div class="col-4">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>

            </div>
            @endif

            </div>
            <div class="col-4">
            </div>
            <div class="col-4">
            <div class="input-group">
                <form class="form-inline" type="get" action="{{url('/search')}}">
                    <input class="form-control mr-sm-2" name="query"type="search" placeholder="Search by furniture's name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0"style="background-color: #a84cac;color: white;" type="submit">Search</button>
                </form>
                </div>
            </div>
            </div>
            <div class="row justify-content-center">
               
                    <div class="col">
                    <div class="card-deck">
                    @foreach($furnitures as $furniture)
                        <div class="card">
                            <a href="{{url('furniture/detail/'.$furniture->id)}}">
                                    <img class="card-img-top"src="{{asset($furniture->furnitureImage)}}" alt="Card image cap" style="height:200px">
                            </a>
                                
                            <div class="card-body" style="background-color: #a84cac;">
                                <p class="card-title" style="color: white; font-weight: bold; text-align: center;">{{$furniture->furnitureName}}</p>
                                <p class="card-text" style="color: white;text-align: center;">Rp. {{$furniture->furniturePrice}}</p>
                                <div class="row">
                                    <div class="col">
                                    <a href="{{url('furniture/edit/'.$furniture->id)}}" class="btn btn-success">Update</a>
                                    </div>
                                    <div class="col">
                                    <a href="{{url('furniture/delete/'.$furniture->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>      
                                    </div>
                                </div>    
                            </div>
                        </div>
                    @endforeach
                    </div>
                    </div>
                    
                </div>
                {{$furnitures->links('pagination::bootstrap-4')}}

                
                </div>
          
                
            <!--  -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>