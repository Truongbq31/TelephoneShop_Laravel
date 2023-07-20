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
                                        <h5>Banner Information</h5>
                                    </div>

                                    <form action="{{route('route_admin_editBanners',['id'=>$banners->id])}}" method="POST" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Banner</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <img id="mat_truoc_preview" src="{{''.\Illuminate\Support\Facades\Storage::url($banners->image)}}" alt="your image"
                                                                 style="max-width: 100%; height:300px; margin-bottom: 10px;" class="img-fluid"/>
                                                            <input value="{{$banners->image}}" type="file" name="image" accept="image/*"
                                                                   class="form-control-file form-control form-choose @error('image') is-invalid @enderror" id="cmt_truoc">
                                                        </div>
                                                    </div>
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


