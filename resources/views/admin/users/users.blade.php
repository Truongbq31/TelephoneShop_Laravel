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
                                            <a class="btn btn-solid" href="">Add Categories</a>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Role</th>
                                            <th>Option</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($users as $user)
                                            <tr>

                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td class="status-close">
                                                    <a href="{{route('route_admin_updateStatus', ['id'=>$user->id])}}">{{$user->status == 1 ? "OPEN" : "LOCK"}}</a>
                                                </td>
                                                <td class="td-price">{{$user->role == 1 ? "Admin" : "User"}}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a <?php echo $user->status == 0 ? "hidden" : "" ?> href="{{route('route_admin_updateStatus', ['id'=>$user->id])}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                                                            </a>

                                                            <a <?php echo $user->status == 1 ? "hidden" : "" ?> href="{{route('route_admin_updateStatus', ['id'=>$user->id])}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M423.5 0C339.5.3 272 69.5 272 153.5V224H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48h-48v-71.1c0-39.6 31.7-72.5 71.3-72.9 40-.4 72.7 32.1 72.7 72v80c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24v-80C576 68 507.5-.3 423.5 0z"/></svg>
                                                            </a>
                                                        </li>

{{--                                                        <li>--}}
{{--                                                            <a onclick="return confirm('Confirm delete?')" href="">--}}
{{--                                                                <i class="fa-solid fa-trash-can"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
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


