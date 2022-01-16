@extends('layouts.app')

@section('content')

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

@endsection