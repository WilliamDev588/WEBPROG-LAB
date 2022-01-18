@extends('layouts.app')

@section('content')
<div class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                <!-- Shopping cart table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Furniture Image</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Furniture Name</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantity</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Total</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Button</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Remove</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <img src="{{Storage::url($details['furnitureImage']) }}" alt=""
                                            style="height: 100px; width: 150px;" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>{{$details['furnitureName']}}</strong></td>

                                <td class="border-0 align-middle"><strong>{{$details['furniturePrice']}}</strong> <input
                                        type="hidden" class="price" value="{{$details['furniturePrice']}}"></td>

                                <td class="border-0 align-middle"><strong>{{$details['quantity']}}</strong> <input
                                        type="hidden" class="price" value="{{$details['furniturePrice']}}"></td>
                                <td class="border-0 align-middle subTotal">{{$details['quantity'] *
                                    $details['furniturePrice']}}</td>


                                <td class="border-0 align-middle"><a href="/removeCart/{{$id}}"
                                        class="text-dark">Remove</a></td>
                                <td>
                                    <a href="/addToCart/{{$id}}" class="btn btn-success">+</a>
                                    <a href="/minusToCart/{{$id}}" class="btn btn-danger">-</a>

                                </td>


                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- End -->
            </div>
        </div>
        <div class="row py-5 p-4 bg-white rounded shadow-sm">

            <div class="col-lg-6">
                <div class="p-4">
                    <ul class="list-unstyled mb-4">

                        <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                class="text-muted">Total</strong>
                            <h5 class="font-weight-bold">{{$total}}</h5>
                        </li>
                    </ul>
                    <a class="btn rounded-pill bg-dark " style="width: 20rem; color: white; margin-left:5rem;"
                        href="{{url('/checkoutPage')}}" role="button">Proceed to checkout</a>

                    </a>
                </div>
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
=======
</div>

>>>>>>> Stashed changes
@endsection