@extends('user_template.layouts.template')
@section('main-content')
<h2>Final step to place your order</h2>
<div class="row">
    <div class="col-8">
        <div class="box_main">
           <h3>Product Will Send At- </h3>
           <p>City/Village- {{ $shipping_address->city_name }}  </p>
           <p>Area- {{ $shipping_address->area }}  </p>
           <p>Address- {{ $shipping_address->address }}  </p>
           <p>Phone Number- {{ $shipping_address->phone_number }}  </p>


        </div>
    </div>
    <div class="col-4">
        <div class="box_main">
            <h3>Final producs are-</h3>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart_items as $item)
                    <tr>
                        <td>{{ $item->product->product_name}}</td>

                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>

                    </tr>
                    @php
                    $total = $total + $item->price ;

                    @endphp

                    @endforeach

                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>{{ $total }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <form action="" method="POST">
        @csrf
        <input type="submit" value="Cancel Order" class="btn btn-danger mr-3">
    </form>

    <form action="{{ route('user.placeorder') }}" method="POST">
        @csrf
        <input type="submit" value="Place Order" class="btn btn-primary ">
    </form>

</div>
@endsection
