@extends('layouts.app')

@section('content')

<body>


    {{-- <div class="row my-5">
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                <tr>
                    <th scope="col" width="50">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Method</th>
                    <th scope="col">Card Number</th>
                    
                    
                </tr>
                </thead>
                <tbody>
                    @foreach($txHistory as $txHistory)
                    @for($i = 0; $i < count($txHistory->transactiondetail); $i++)
                        <tr>
                            <th scope="row">{{$txHistory->id}}</th>
                            <td>{{$txHistory->transactionDate}}</td>
                            <td>{{$txHistory->method}}</td>
                            <td>{{$txHistory->cardNumber}}</td>

                            <td>{{$txHistory->transactiondetail[$i]->furnitureName}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->furniturePrice}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->quantity}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->quantity *
                                $txHistory->transactiondetail[$i]->furniturePrice}}</td>

                            <td>{{$txHistory->total}}</td>
                        </tr>
                        @endfor
                        @endforeach

                </tbody>
            </table>

        </div>
    </div> --}}
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Orders</h3>
        <div class="col">
        @if(Auth::check())

        @if(Auth::user()->role =='Admin')
            @foreach($txHistory as $txHistory)
            
            <table class="table bg-white rounded shadow-sm  table-hover">
                <b>
                    No: {{$txHistory->id}} <br>
                    Date: {{$txHistory->transactionDate}}<br>
                    Method: {{$txHistory->method}}<br>
                    Card Number: {{$txHistory->cardNumber}}<br>
                    User name: {{$txHistory->User->fullname}}</th>
                </b>
                <tr>
                    <th scope="col">Furniture Name</th>
                    <th scope="col">Furniture Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
                <tbody>
                    @for($i = 0; $i < count($txHistory->transactiondetail); $i++)
                        <tr>
                            <td>{{$txHistory->transactiondetail[$i]->furnitureName}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->furniturePrice}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->quantity}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->quantity *
                                $txHistory->transactiondetail[$i]->furniturePrice}}</td>
                        </tr>
                        @endfor
                </tbody>
                <th scope="col">Total: {{$txHistory->total}}</th>
            </table>
            <br><br>
            @endforeach
            @else
            @foreach($txHistory as $txHistory)
            @if(Auth::user()->id == $txHistory->idUser)
            <table class="table bg-white rounded shadow-sm  table-hover">
                <b>
                    No: {{$txHistory->id}} <br>
                    Date: {{$txHistory->transactionDate}}<br>
                    Method: {{$txHistory->method}}<br>
                    Card Number: {{$txHistory->cardNumber}}<br>
                    User name: {{$txHistory->User->fullname}}</th>
                </b>
                <tr>
                    <th scope="col">Furniture Name</th>
                    <th scope="col">Furniture Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
                <tbody>
                    @for($i = 0; $i < count($txHistory->transactiondetail); $i++)
                        <tr>
                            <td>{{$txHistory->transactiondetail[$i]->furnitureName}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->furniturePrice}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->quantity}}</td>
                            <td>{{$txHistory->transactiondetail[$i]->quantity *
                                $txHistory->transactiondetail[$i]->furniturePrice}}</td>
                        </tr>
                        @endfor
                </tbody>
                <th scope="col">Total: {{$txHistory->total}}</th>
            </table>
            <br><br>
            @endif

            @endforeach
        @endif
        @else
        Please Login first
        @endif
        </div>
    </div>

@endsection