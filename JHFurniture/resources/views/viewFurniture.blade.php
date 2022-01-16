@extends('layouts.app')

@section('content')

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
                {{$furnitures->links('pagination::bootstrap-4')}}

                
                </div>
@endsection
