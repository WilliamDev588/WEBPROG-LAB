@extends('layouts.app')

@section('content')
    

<div class="py-12">
@if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            </div>
            @endif
        <div class="container">
            <div class="row">
            
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add furniture</div>
                <div class="card-body"></div>
            <form action="{{route('store.furniture')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">furniture Name</label>
                    <input type="text" name="furnitureName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('furnitureName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     
                </div>
                <div class="form-group">
                    
                    <label for="exampleInputEmail2" class="form-label">furniture Price</label>
                    <input type="text" name="furniturePrice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('furniturePrice')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                       
                </div>
                <div class="form-group">
                    
                    <label for="exampleInputEmail3" class="form-label">furniture Type</label>
                    <!-- <input type="text" name="furnitureType" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    <select class="form-select" aria-label="Default select example" name="furnitureType">
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
                    
                    <label for="exampleInputEmail3" class="form-label">furniture Color</label>
                    <!-- <input type="text" name="furnitureColor" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    <select class="form-select" aria-label="Default select example" name="furnitureColor">
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
                    <label for="exampleInputEmail1" class="form-label">furniture Image</label>
                    <input type="file" name="furnitureImage" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('furnitureImage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Furniture</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection