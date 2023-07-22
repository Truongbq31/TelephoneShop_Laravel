@extends("templates.layoutAdmin")
@section("content")
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Attributes Information</h5>
                                    </div>

                                    <form action="{{route('route_admin_editAttributes', ['id'=>$attributes->id])}}" method="POST" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Attributes Name</label>
                                            <div class="col-sm-9">
                                                <input value="{{$attributes->name}}" name="name" class="form-control" type="text" placeholder="Attributes Name">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Attributes Value</label>
                                            <div class="col-sm-9">
                                                <input value="{{$attributes->value}}" name="value" class="form-control" type="text" placeholder="Attributes Value">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success">Save</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    </div>
@endsection


