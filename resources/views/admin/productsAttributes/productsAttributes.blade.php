@extends("templates.layoutAdmin")
@section("content")
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title d-sm-flex d-block">
                                <h5>Attributes List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="{{route('route_admin_addProductsAttributes')}}">Add ProductsAttributes</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{--                            <label>Search:<input type="search" class="" placeholder="" aria-controls="table_id"></label>--}}
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package theme-table table-product" id="table_id">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Color</th>
                                            <th>Option</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($productsAttributes as $prdattr)
                                            @foreach($prdattr-> attributes as $value)
                                            <tr>
                                                <td>{{$prdattr->name}}</td>
                                                <td>{{$prdattr->price}}</td>
                                                <td>{{$value -> value}}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('route_admin_editProductsAttributes',['products_id'=>$prdattr->id,'attributes_id'=>$value->id])}}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </li>

                                                        <li>
{{--                                                            <a onclick="return confirm('Confirm delete?')" href="{{route('route_admin_deleteProductsAttributes',['id'=>$->id])}}">--}}
{{--                                                                <i class="fa-solid fa-trash-can"></i>--}}
{{--                                                            </a>--}}
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
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
        <!-- Container-fluid Ends-->
    </div>

@endsection



