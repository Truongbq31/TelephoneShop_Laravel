@extends('templates.layoutClient')
@section('content')
    <main>
        <h1 align="center" class="title">Order Success</h1>
        <!-- cart area start -->
        <p align="center" style="color: red">Sales staff will call you to confirm after 15 minutes right after you place your order successfully.</p>
        <div align="center">
            <a href="{{route('home')}}"  class="site-btn site-btn site-btn__bghide" >
                Back to Homepage
            </a>
        </div>
        <div class="cart-area pt-120 pb-120">
            <div class="container">
                <h4 align="center">Order Information Placed In The Last 24 Hours</h4>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-wrapper">
                                <table class="table">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Delivery Address</th>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                    </tr>
                                    <tbody>
                                    @foreach($orderDetail as $value)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a class="img">
                                                    <img src="{{''.\Illuminate\Support\Facades\Storage::url($value->image)}}" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name"><a>{{$value->product_name}}</a></td>
                                            <td>{{$value->quantity}}</td>
                                            <td>{{number_format($value->total_price)}}đ</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{$value->user_name}}</td>
                                            <td>{{$value->phone_number}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart area end -->
    </main>
@endsection
