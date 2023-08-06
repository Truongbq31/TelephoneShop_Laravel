@extends('templates.layoutAdmin')
@section('content')
    <div class="page-body">
        <!-- Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Order List</h5>
                                <a href="#" class="btn btn-solid">Download all orders</a>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package order-table theme-table" id="table_id">
                                        <thead>
                                        <tr>
                                            <th>Order Image</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            <th>Option</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($orders as $order)
                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <a class="d-block">
                                                                <span class="order-image">
                                                                    <img src="{{''.\Illuminate\Support\Facades\Storage::url($order->image)}}"
                                                                         class="img-fluid" alt="users">
                                                                </span>
                                                </a>
                                            </td>

                                            <td>{{$order->username}}</td>

                                            <td>{{$order->created_at}}</td>

                                            <td>{{$order->quantity}}</td>

                                            <td class="order-success">
                                                <span>{{$order->status == 1 ? "Paid" : "Unpaid"}}</span>
                                            </td>

                                            <td>{{number_format($order->total_price)}}</td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a onclick="return confirm('Confirm delete?')" href="{{route('route_admin_orderDelete', ['id'=>$order->id])}}">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->

        <!-- footer start-->
        <div class="container-fluid">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
