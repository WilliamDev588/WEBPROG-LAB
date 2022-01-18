@extends('layouts.app')

@section('content')
<div class="container">
        
        <div class="row justify-content-center">
            <h2 style="color: #a84cac;">{{$furnitures->furnitureName}}</h2>
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

   
    
  </div>
  @if(Auth::check())

@if(Auth::user()->role =='Admin')
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
@else
<div class="col-4">
    <a href="{{url('addCart/'.$furnitures->id)}}" class="btn btn-success" >Add To Cart</a>    
 </div>
 <div class="col-2">
    <a href="{{ url()->previous() }}" class="btn btn-info" >Previous</a>    
    </div>
@endif
@endif
    
  </div>
  
</div>

@endsection