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
                                        <h5>Product Information</h5>
                                    </div>

                                    <form action="{{route('route_admin_editProducts',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                            <div class="col-sm-9">
                                                <input value="{{$product->name}}" name="name" class="form-control" type="text" placeholder="Product Name">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="category_id">
                                                    <option disabled>Category Menu</option>
                                                    <option value="{{$product->category_id}}" selected>{{$product->cate_name}}</option>

                                                    @foreach($category as $cate)
                                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{--                                        <div class="mb-4 row align-items-center">--}}
                                        {{--                                            <label class="col-sm-3 col-form-label form-label-title">Brand</label>--}}
                                        {{--                                            <div class="col-sm-9">--}}
                                        {{--                                                <select class="js-example-basic-single w-100">--}}
                                        {{--                                                    <option disabled>Brand Menu</option>--}}
                                        {{--                                                    <option value="puma">Puma</option>--}}
                                        {{--                                                    <option value="hrx">HRX</option>--}}
                                        {{--                                                    <option value="roadster">Roadster</option>--}}
                                        {{--                                                    <option value="zara">Zara</option>--}}
                                        {{--                                                </select>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Status</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="status">
                                                    <option value="{{$product->status}}">{{$product->status == 1 ? "Stock" : "Out of stock"}}</option>
                                                    <option value="1">Stock</option>
                                                    <option value="0">Out of stock</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 form-label-title">Price</label>
                                            <div class="col-sm-9">
                                                <input value="{{$product->price}}" name="price" class="form-control" type="text" placeholder="0">
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label class="form-label-title col-sm-3 mb-0">Meta description</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="card-header-2">
                                                <h5>Product Images</h5>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Thumbnails Image</label>
                                                <div class="col-sm-9">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <img id="mat_truoc_preview" src="{{''.\Illuminate\Support\Facades\Storage::url($product->image)}}" alt="your image"
                                                                     style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                                                <input type="file" name="image" accept="image/*"
                                                                       class="form-control-file form-control form-choose @error('image') is-invalid @enderror" id="cmt_truoc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-sm-3 col-form-label form-label-title">Images</label>
                                                <div class="col-sm-9">
                                                    <input name="images[]" class="form-control form-choose" type="file"
                                                           id="formFile" multiple>
                                                </div>
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

@section('script')
    <script>
        $(function(){
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function () {
                readURL(this, '#mat_truoc_preview');
            });

        });
    </script>
@endsection

