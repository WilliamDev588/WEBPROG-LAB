@extends('layouts.app')

@section('content')
        @if(Auth::check())
        {{ Auth::user()->fullname }}

                                            
                                        
        @endif
                

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
                                @if(Auth::check())

                                    @if(Auth::user()->role =='Admin')
                                    <div class="row">
                                        <div class="col">
                                        <a href="{{url('furniture/edit/'.$furniture->id)}}" class="btn btn-success">Update</a>
                                        </div>
                                        <div class="col">
                                        <a href="{{url('furniture/delete/'.$furniture->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>      
                                        </div>
                                    </div>  
                                    @else
                                    <div class="row">
                                        <div class="col">
                                        <a href="{{url('addCart/'.$furniture->id)}}" class="btn btn-success">Add to cart</a>
                                        </div>
                                
                                    </div>  
                                    @endif
                                @else
                                <div class="row">
                                        <div class="col">
                                        <a href="/profile" class="btn btn-success">Add to cart</a>
                                        </div>
                                
                                    </div> 
                                @endif   
                            </div>
                        </div>
                    @endforeach
                    </div>
                    </div>
                    
                </div>
                
                </div>
@endsection
