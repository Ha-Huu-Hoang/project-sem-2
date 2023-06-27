@extends('front.layout.master')
@section('title','Order Detail')
@section('body')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order Detail</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <a href="{{url("/shop")}}">My Order</a>
                            <span>Order Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{url("/checkout")}}" method="post">
                    @csrf

                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id ?? ''}}" >

                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="d-flex justify-content-between form__order">
                                <h6 class="order-detail__title">Order ID: #{{$order->id}}</h6>
                                <h6 class="order-detail__title">Status:
                                    @switch($order->status)
                                        @case(0)<span class="text text-secondary">Pending</span>@break
                                        @case(1)<span class="text text-primary">Confirmed</span>@break
                                        @case(2)<span class="text text-primary">Shipping</span>@break
                                        @case(3)<span class="text text-warning">Shipped</span>@break
                                        @case(4)<span class="text text-success">Completed</span>@break
                                        @case(5)<span class="text text-danger">Cancel</span>@break
                                    @endswitch
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name" value="{{$order->first_name}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name" value="{{$order->last_name}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" value="{{$order->country}}" disabled>
                            </div>
                            <div class="checkout__input">
                                <p>Street Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="street_address" value="{{$order->street_address}}" disabled>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town_city" value="{{$order->town_city}}" disabled>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postcode_zip" value="{{$order->postcode_zip}}" disabled>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{{$order->phone}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" value="{{$order->email}}" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($order->orderDetails as $orderDetail)
                                        <li>
                                            {{ $orderDetail->product->name }} x{{ $orderDetail->qty }}
                                            <span>${{$orderDetail->total}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>${{ number_format($subtotal, 2, '.', '') }}</span></li>
                                    <li>VAT 10% <span>${{ number_format($vatAmount, 2, '.', '') }}</span></li>
                                    <li>Total <span>${{ number_format($total, 2, '.', '') }}</span></li>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        COD
                                        <input name="payment_method" type="radio" id="payment" value="COD" {{$order->payment_method == 'COD' ? 'checked' : ''}} disabled>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input name="payment_method" type="radio" id="paypal" value="PayPal" {{$order->payment_method == 'PayPal' ? 'checked' : ''}} disabled>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="MoMo">
                                        MoMo
                                        <input name="payment_method" type="radio" id="MoMo" value="MoMo" {{$order->payment_method == 'MoMo' ? 'checked' : ''}} disabled>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="VNPAY">
                                        VNPAY
                                        <input name="payment_method" type="radio" id="VNPAY" value="VNPAY" {{$order->payment_method == 'VNPAY' ? 'checked' : ''}} disabled>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
