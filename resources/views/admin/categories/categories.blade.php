@extends("templates.layoutAdmin")
@section("content")
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title d-sm-flex d-block">
                                <h5>Categories List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="{{route('route_admin_addCategories')}}">Add Categories</a>
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
                                            <th>Cate Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Option</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($categories as $cate)
                                            <tr>

                                                <td>{{$cate->name}}</td>
                                                <td>{{$cate->slug}}</td>
                                                <td>{{$cate->status == 1 ? "Open" : "Close"}}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('route_admin_editCategories',['id'=>$cate->id])}}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a onclick="return confirm('Confirm delete?')" href="{{route("route_admin_deleteCategories", ['id'=>$cate->id])}}">
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

