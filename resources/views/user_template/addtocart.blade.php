@extends('user_template.layouts.template')
@section('main-content')
<h2>addtocart</h2>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{(session()->get('message'))}}
            </div>
        @endif
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>SL</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>

                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{ asset($item->product->product_img)}} " style="height: 100px"></td>
                            <td>{{ $item->product->product_name}}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td><a href="{{ route('user.removeitem', $item->id) }}" class="btn btn-warning">Remove</a></td>

                        </tr>
                        @php
                        $total = $total + $item->price ;

                        @endphp

                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>{{ $total }}</td>
                            @if ($total > 0 )

                                <td><a href="{{ route('user.shippingaddress') }}" class="btn btn-primary">Checkout Now</a></td>
                        </tr>
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
