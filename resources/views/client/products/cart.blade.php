@extends('templates.layoutClient')
@section('content')
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Shopping Cart</h3>
                        <div class="breadcrumb__list">
                            <span><a href="#">Home</a></span>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->
    <!-- cart area start -->
    <section class="tp-cart-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="tp-cart-list mb-25 mr-30">
                        <table class="table">
                            <thead>
                            <tr>
{{--                                <th colspan="2" class="tp-cart-header-product">Product</th>--}}
                                <th class="tp-cart-header-price">Image</th>
                                <th class="tp-cart-header-price">Product Name</th>
                                <th class="tp-cart-header-quantity">Price</th>
                                <th class="tp-cart-header-quantity">Quantity</th>
                                <th class="tp-cart-header-quantity">Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <!-- img -->
                                <td class="tp-cart-img"><img src="{{''.\Illuminate\Support\Facades\Storage::url($cart->options->image)}}" alt=""></td>
                                <!-- title -->
                                <td class="tp-cart-title">{{$cart->name}}</td>
                                <!-- price -->
                                <td class="tp-cart-price"><span>{{number_format($cart->price)}}</span></td>
                                <!-- quantity -->
                                <td class="tp-cart-quantity">
{{--                                    <div class="tp-product-quantity mt-10 mb-10">--}}
{{--                                       <span class="tp-cart-minus">--}}
{{--                                          <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                             <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                          </svg>--}}
{{--                                       </span>--}}
{{--                                        <input class="tp-cart-input" type="text" value="{{$cart->qty}}">--}}
{{--                                        <span class="tp-cart-plus">--}}
{{--                                          <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                             <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                             <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                          </svg>--}}
{{--                                       </span>--}}
{{--                                    </div>--}}
                                    <div class="input-group quantity-selector quantity-selector-sm">

                                        <button type="button" class="btn btn-icon btn-secondary btn-sm" aria-describedby="inputQuantitySelectorSm" data-bs-step="down"></button>
{{--                                            <span class="visually-hidden">Step down</span>--}}
                                        <input type="number" id="inputQuantitySelectorSm" class="form-control" aria-live="polite" data-bs-step="counter" name="quantity" title="quantity" value="{{$cart->qty}}" data-rowId="{{$cart->rowId}}" min="0" max="10" step="1" data-bs-round="0" aria-label="Quantity selector">
                                        <button type="button" class="btn btn-icon btn-secondary btn-sm" aria-describedby="inputQuantitySelectorSm" data-bs-step="up"> </button>
{{--                                            <span class="visually-hidden">Step up</span>--}}
                                    </div>
                                </td>
                                <td class="tp-cart-price"><span>{{number_format($cart->price * $cart->qty)}}</span></td>
                                <!-- action -->
                                <td class="tp-cart-action">
                                    <button class="tp-cart-action-btn">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path onclick="window.location='{{route('route_cart_delete',['id'=> $cart->rowId])}}'" fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                                        </svg>
{{--                                        <span>Remove</span>--}}
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tp-cart-bottom">
                        <div class="row align-items-end">
                            <div class="col-xl-6 col-md-8">
                                <div class="tp-cart-coupon">
                                    <form action="#">
                                        <div class="tp-cart-coupon-input-box">
                                            <label>Coupon Code:</label>
                                            <div class="tp-cart-coupon-input d-flex align-items-center">
                                                <input type="text" placeholder="Enter Coupon Code">
                                                <button type="submit">Apply</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-4">
                                <div class="tp-cart-update text-md-end">
                                    <button type="button" class="tp-cart-update-btn">Update Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="tp-cart-checkout-wrapper">
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="tp-cart-checkout-top-title">Subtotal</span>
                            <span class="tp-cart-checkout-top-price">{{$subtotal}}</span>
                        </div>

                        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                            <span>Total</span>
                            <span>{{$total}}</span>
                        </div>
                        <div class="tp-cart-checkout-proceed">
                            <a href="checkout.html" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart area end -->
@endsection
