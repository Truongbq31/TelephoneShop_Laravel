<div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0" true>
    <div class="tp-product-details-review-wrapper pt-60">
        <div class="row">
            <div class="col-lg-6">
                <div class="tp-product-details-review-statics">
                    <!-- number -->
                    <div class="tp-product-details-review-number d-inline-block mb-50">
                        <h3 class="tp-product-details-review-number-title">Customer reviews</h3>
                        <div class="tp-product-details-review-summery d-flex align-items-center">
                            <div class="tp-product-details-review-summery-value">
                                <span>4.5</span>
                            </div>
                            <div class="tp-product-details-review-summery-rating d-flex align-items-center">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <p>(36 Reviews)</p>
                            </div>
                        </div>
                        <div class="tp-product-details-review-rating-list">
                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                <span>5 Start</span>
                                <div class="tp-product-details-review-rating-bar">
                                    <span class="tp-product-details-review-rating-bar-inner" data-width="82%"></span>
                                </div>
                                <div class="tp-product-details-review-rating-percent">
                                    <span>82%</span>
                                </div>
                            </div> <!-- end single item -->

                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                <span>4 Start</span>
                                <div class="tp-product-details-review-rating-bar">
                                    <span class="tp-product-details-review-rating-bar-inner" data-width="30%"></span>
                                </div>
                                <div class="tp-product-details-review-rating-percent">
                                    <span>30%</span>
                                </div>
                            </div> <!-- end single item -->

                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                <span>3 Start</span>
                                <div class="tp-product-details-review-rating-bar">
                                    <span class="tp-product-details-review-rating-bar-inner" data-width="15%"></span>
                                </div>
                                <div class="tp-product-details-review-rating-percent">
                                    <span>15%</span>
                                </div>
                            </div> <!-- end single item -->

                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                <span>2 Start</span>
                                <div class="tp-product-details-review-rating-bar">
                                    <span class="tp-product-details-review-rating-bar-inner" data-width="6%"></span>
                                </div>
                                <div class="tp-product-details-review-rating-percent">
                                    <span>6%</span>
                                </div>
                            </div> <!-- end single item -->

                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                <span>1 Start</span>
                                <div class="tp-product-details-review-rating-bar">
                                    <span class="tp-product-details-review-rating-bar-inner" data-width="10%"></span>
                                </div>
                                <div class="tp-product-details-review-rating-percent">
                                    <span>10%</span>
                                </div>
                            </div> <!-- end single item -->
                        </div>
                    </div>

                    <!-- reviews -->
                    <div class="tp-product-details-review-list pr-110">
                        <h3 class="tp-product-details-review-title">Rating & Review</h3>
                        @foreach($comments as $comm)
                        <div id="show_comments" class="tp-product-details-review-avater d-flex align-items-start">
                            <div class="tp-product-details-review-avater-thumb">
                                <a href="#">
                                    <img src="{{asset('client/assets/img/login/User_icon_2.svg.png')}}" alt="">
                                </a>
                            </div>
                            <div class="tp-product-details-review-avater-content">
                                <div class="tp-product-details-review-avater-rating d-flex align-items-center">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <h3 class="tp-product-details-review-avater-title">{{$comm->name}}</h3>
                                <span class="tp-product-details-review-avater-meta">{{$comm->created_at}}</span>

                                <div class="tp-product-details-review-avater-comment">
                                    <p>{{$comm->content}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="tp-product-details-review-form">
                        <h3 class="tp-product-details-review-form-title">Review this product</h3>
                        <p>Your email address will not be published. Required fields are marked *</p>

                        @if(\Illuminate\Support\Facades\Auth::user())
                        <form action="{{route('route_client_comments')}}" method="POST">
                            @csrf
                            <div class="tp-product-details-review-form-rating d-flex align-items-center">
                                <p>Your Rating:</p>
                                <div class="tp-product-details-review-form-rating-icon d-flex align-items-center">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                            </div>

                            <div class="tp-product-details-review-input-wrapper">
                                <input name="prd_id" type="hidden" id="prd_id" value="{{$prd->id}}">
                                <div class="tp-product-details-review-input-box">
                                    <div class="tp-product-details-review-input">
                                        <textarea id="content" name="content_comment" placeholder="Write your review here..."></textarea>
                                    </div>
                                    <div  class="tp-product-details-review-input-title">
                                        <label for="msg">Your Comment</label>
                                    </div>
                                    <small id="comment-error" ></small>
                                </div>

                            </div>
                            <div class="tp-product-details-review-btn-wrapper">
                                <button id="btn-comment" type="submit" class="tp-product-details-review-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="tp-product-details-review-btn-wrapper">
                    <button onclick="window.location.href='{{route('route_client_login')}}'" id="btn-comment" type="submit" class="tp-product-details-review-btn">Please login to comments</button>
                </div>
            @endif
        </div>
    </div>
</div>
@section('script')
{{--    <script type="text/javascript">--}}
{{--        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });--}}
{{--        var _csrf = '{{csrf_token()}}'--}}
{{--        $('#btn-comment').click(function (e){--}}
{{--            e.preventDefault();--}}
{{--            // alert(1);--}}
{{--            let content = $('#content').val();--}}
{{--            let prd_id = $('#prd_id').val();--}}
{{--            let _url = '{{route('route_client_comments')}}';--}}
{{--            console.log(_url);--}}
{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                url: _url,--}}
{{--                data: {--}}
{{--                    prd_id: prd_id,--}}
{{--                    content: content,--}}
{{--                    _token: _csrf,--}}
{{--                },--}}
{{--                success: function(data) {--}}
{{--                    alert(data.d);--}}
{{--                },--}}
{{--            });--}}

{{--        })--}}
{{--    </script>--}}
@endsection
