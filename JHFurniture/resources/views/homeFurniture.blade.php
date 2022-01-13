<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
        <h2>Welcome, <b>{{Auth::user()->name}}</b></h2>

           

                <div class="container">
                
                <div class="col align-items-center">
                @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            </div>
            @endif
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
                
                </div>
            
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>