<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
        
        <div class="row justify-content-center">
            <h2 style="color: #a84cac;">{{$furnitures->furnitureName}}</h2>
            {{$furnitures->furnitureName}}
        </div>
        
        
    <div class="row justify-content-center">
        <div class="col-4">
        <img src="{{asset($furnitures->furnitureImage)}}" style="height:250px; width:250px">    
        </div>
        <div class="col-4">
        <table style="color: #a84cac;">
        <tr>
            <th>
                <p>   Name: </p>
            </th>
            <td>
                <p>                {{$furnitures->furnitureName}}</p>

            </td>
            
        </tr>
        <tr>
            <th>
            <p>Price:</p>
                 </th>
            <td>

         <p>Rp. {{$furnitures->furniturePrice}}</p>       
            </td>
        </tr>
        <tr>
            <th>Type: </th>
            <td>

                {{$furnitures->furnitureType}}
            </td>
        </tr>
        <tr>
            <th>Color: </th>
            <td>{{$furnitures->furnitureColor}}</td>
        </tr>
      </table>        </div>
  </div> 
  <div class="row">

    <!-- <div class="col-sm">
    <img src="{{asset($furnitures->furnitureImage)}}" style="height:250px; width:250px">    
    </div>
    <div class="col-sm">
      <table style="color: #a84cac;">
        <tr>
            <th>Name: </th>
            <td>

                {{$furnitures->furnitureName}}

            </td>
            
        </tr>
        <tr>
            <th>Price: </th>
            <td>

                Rp. {{$furnitures->furniturePrice}}
            </td>
        </tr>
        <tr>
            <th>Type: </th>
            <td>

                {{$furnitures->furnitureType}}
            </td>
        </tr>
        <tr>
            <th>Color: </th>
            <td>{{$furnitures->furnitureColor}}</td>
        </tr>
      </table>
    </div>
     -->

    
  </div>
  <div class="row justify-content-center">
    <div class="col-2">
    <a href="{{url('furniture/edit/'.$furnitures->id)}}" class="btn btn-success">Update</a>
    </div>

    <div class="col-2">
    <a href="{{url('furniture/delete/'.$furnitures->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>    
    </div>
    <div class="col-2">
    <a href="{{ url()->previous() }}" class="btn btn-info" >Previous</a>    
    </div>
  </div>
  
</div>
<!-- <div class="col-md-8">
            <div class="card">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            </div>
            @endif
                <div class="card-header">All Foods</div>
            
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Furniture Name</th>
                    <th scope="col">Furniture Price</th>
                    <th scope="col">Furniture Type</th>
                    <th scope="col">Furniture Color</th>
                    <th scope="col">Furniture Image</th>

                    <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{{$furnitures->furnitureName}}</td>
                    <td>{{$furnitures->furniturePrice}}</td>
                    <td>{{$furnitures->furnitureType}}</td>
                    <td>{{$furnitures->furnitureColor}}</td>

                    <td><img src="{{asset($furnitures->furnitureImage)}}" style="height:70px; width:100px"></td>
                    <td>
                        <a href="{{url('furniture/edit/'.$furnitures->id)}}" class="btn btn-info">Update</a>
                        <a href="{{url('furniture/delete/'.$furnitures->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                    </td>
                    </tr>
                </tbody>
                </table>
                </div>
            </div> -->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>   
</html>