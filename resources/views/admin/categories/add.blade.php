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
                                        <h5>Category Information</h5>
                                    </div>

                                    <form action="{{route('route_admin_addCategories')}}" method="POST" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                            <div class="col-sm-9">
                                                <input name="name" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Slug</label>
                                            <div class="col-sm-9">
                                                <input value="" name="slug" class="form-control" type="text" placeholder="/">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success">Upload</button>
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
