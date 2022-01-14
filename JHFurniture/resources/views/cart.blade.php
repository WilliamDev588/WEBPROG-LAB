<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
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
                                            <img src="{{Storage::url($details['furnitureImage']) }}" alt="" style="height: 100px; width: 150px;" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>{{$details['furnitureName']}}</strong></td>
                                    
                                    <td class="border-0 align-middle"><strong>{{$details['furniturePrice']}}</strong> <input type="hidden" class="price" value="{{$details['furniturePrice']}}"></td>
                                    
                                    <td class="border-0 align-middle"><strong>{{$details['quantity']}}</strong> <input type="hidden" class="price" value="{{$details['furniturePrice']}}"></td>
                                    <td class="border-0 align-middle subTotal">{{$details['quantity'] * $details['furniturePrice']}}</td>
                                    
                                  
                                    <td class="border-0 align-middle"><a href="/removeCart/{{$id}}" class="text-dark">Remove</a></td>
                                    <td>
                                    <a href="/addToCart/{{$id}}" class="btn btn-success" >+</a>
                                    <a href="/minusToCart/{{$id}}" class="btn btn-danger" >-</a>
 
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
            <form action="/checkout" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                   
                    <div class="col-lg-6">
                        <div class="p-4">
                            <ul class="list-unstyled mb-4">
                                
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold">{{$total}}</h5>
                                </li>
                            </ul>
                            <button type="submit" class="btn rounded-pill bg-dark " style="width: 20rem; color: white; margin-left:5rem;">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
        function increment_quantity(cart_id) {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            var newQuantity = parseInt($(inputQuantityElement).val())+1;
            save_to_db(cart_id, newQuantity);
        }

        function decrement_quantity(cart_id) {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            if($(inputQuantityElement).val() > 1) 
            {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            save_to_db(cart_id, newQuantity);
            }
        }

        function save_to_db(cart_id, new_quantity) {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            $.ajax({
                url : "update_cart_quantity.php",
                data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
                type : 'post',
                success : function(response) {
                    $(inputQuantityElement).val(new_quantity);
                }
            });
        }
</script>
</body>
</html>