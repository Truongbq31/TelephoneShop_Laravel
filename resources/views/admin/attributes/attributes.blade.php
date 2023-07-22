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
                                            <a class="btn btn-solid" href="{{route('route_admin_addAttributes')}}">Add Categories</a>
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
                                            <th>Attributes Name</th>
                                            <th>Attributes Value</th>
                                            <th>Create at</th>
                                            <th>Update at</th>
                                            <th>Option</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($attributes as $at)
                                            <tr>

                                                <td>{{$at->name}}</td>
                                                <td>{{$at->value}}</td>
                                                <td>{{$at->created_at}}</td>
                                                <td>{{$at->updated_at}}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a onclick="return confirm('Confirm delete?')" href="{{route('route_admin_deleteAttributes',['id'=>$at->id])}}">
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


