<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
                @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

    <div class="py-12">
        <div class="container">
            <div class="row">
            
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit furniture</div>
                <div class="card-body"></div>
            <form action="{{url('furniture/update/'.$furnitures->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldImage" value="{{$furnitures->furnitureImage}}">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Update furniture Name</label>
                    <input type="text" name="furnitureName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$furnitures->furnitureName}}">
                        @error('furnitureName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group">
                    
                    <label for="exampleInputEmail2" class="form-label">furniture Price
                    </label>
                    <input type="text" name="furniturePrice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$furnitures->furniturePrice}}">
                        @error('furniturePrice')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                       
                </div>
                <div class="form-group">
                    
                    <label for="exampleInputEmail3" class="form-label">furniture Type</label>
                    <select class="form-select" aria-label="Default select example" name="furnitureType"value="{{$furnitures->furnitureType}}">
                    <option selected>Choose furniture's type</option>
                        <option value="Chair">Chair</option>
                        <option value="Table">Table</option>
                        <option value="Sofa">Sofa</option>
                    </select>
                        @error('furnitureType')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">furniture Color</label>
                    <select class="form-select" aria-label="Default select example" name="furnitureColor"value="{{$furnitures->furnitureColor}}" >

                    <option selected>Choose furniture's color</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                        <option value="Yellow">Yellow</option>
                    </select>
                        @error('furnitureColor')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Furniture Image</label>
                    <input type="file" name="furnitureImage" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$furnitures->furnitureImage}}">
                        @error('furnitureImage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <img src="{{asset($furnitures->furnitureImage)}}" style="width:400px"; height="200px">
                </div>
                <button type="submit" class="btn btn-primary">Update furniture</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>