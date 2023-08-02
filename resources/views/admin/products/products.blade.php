@extends("templates.layoutAdmin")
@section("content")
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title d-sm-flex d-block">
                                <h5>Products List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="{{route('route_admin_addProducts')}}">Add Product</a>
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
                                            <th>Thumbnails Image</th>
                                            <th>Product Name</th>
                                            <th>List Image Product</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($products as $prd)
                                        <tr>
                                            <td>
                                                <div class="table-image">
                                                    <img src="{{$prd->image ? ''.Storage::url($prd->image) : ''}}" class="img-fluid"
                                                         alt="">
                                                </div>
                                            </td>

                                            <td>{{$prd->name}}</td>

                                            <td>

                                                <div class="table-image">
                                                    @foreach($img_products as $img)
                                                        @if($img->id_products == $prd->id)
                                                            <img src="{{''.\Illuminate\Support\Facades\Storage::url($img->images)}}" class="img-fluid"
                                                                 alt="">
                                                        @endif
                                                    @endforeach
                                                </div>

                                            </td>

                                            <td>{{$prd->cate_name}}</td>

                                            <td class="colum-description">{{$prd->description}}</td>

                                            <td class="td-price">${{$prd->price}}</td>

                                            <td class="status-close">
                                                <span>{{$prd->status == 1 ? "Stock" : "Out of stock"}}</span>
                                            </td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('route_admin_editProducts',['id'=>$prd->id])}}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a onclick="return confirm('Confirm delete?')" href="{{route('route_admin_deleteProducts',['id'=>$prd->id])}}">
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
        <!-- Container-fluid Ends-->
    </div>

@endsection
