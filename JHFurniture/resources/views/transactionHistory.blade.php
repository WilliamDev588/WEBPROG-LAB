<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>


    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Orders</h3>
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
                            <td>{{$txHistory->transactiondetail[$i]->quantity * $txHistory->transactiondetail[$i]->furniturePrice}}</td>

                            <td>{{$txHistory->total}}</td>
                        </tr>
                    @endfor
                @endforeach

                </tbody>
            </table>
            
        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<th scope="col">Furniture</th>

                    