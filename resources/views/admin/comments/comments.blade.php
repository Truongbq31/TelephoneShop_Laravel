@extends('templates.layoutAdmin')
@section('content')
    <!-- product review section start -->
    <div class="page-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <!-- Table Start -->
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Product Reviews</h5>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="user-table ticket-table review-table theme-table table"
                                           id="table_id">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Customer Name</th>
                                            <th>Product Name</th>
                                            <th>Comment</th>
                                            <th>Published</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($comments as $comm)
                                        <tr>
                                            <td>{{$comm->id}}</td>
                                            <td>{{$comm->username}}</td>
                                            <td>{{$comm->prd_name}}</td>
                                            <td>{{$comm->content}}</td>
                                            <td class="td-check">
                                                @if($comm->status == 1)
                                                <a href="{{route('route_admin_updateComment',['id'=>$comm->id, 'status'=>$comm->status])}}">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </a>
                                                @else
                                                    <a href="{{route('route_admin_updateComment',['id'=>$comm->id, 'status'=>$comm->status])}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#e81111}</style><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a onclick="return confirm('Confirm delete?')" href="{{route('route_admin_delReview',['id'=>$comm->id])}}">
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
                        <!-- Table End -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid Ends-->

        <div class="container-fluid">
            <!-- footer start-->
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- product review section End -->
@endsection
