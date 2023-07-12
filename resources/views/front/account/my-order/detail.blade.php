{{--@extends('front.layout.master')--}}
{{--@section('title','Order Detail')--}}
{{--@section('body')--}}

{{--    <!-- Breadcrumb Section Begin -->--}}
{{--    <section class="breadcrumb-option">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="breadcrumb__text">--}}
{{--                        <h4>Order Detail</h4>--}}
{{--                        <div class="breadcrumb__links">--}}
{{--                            <a href="{{url("/")}}">Home</a>--}}
{{--                            <a href="{{url("/shop")}}">My Order</a>--}}
{{--                            <span>Order Detail</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Breadcrumb Section End -->--}}

{{--    <!-- Checkout Section Begin -->--}}
{{--    <section class="checkout spad">--}}
{{--        <div class="container">--}}
{{--            <div class="checkout__form">--}}
{{--                <form action="{{url("/checkout")}}" method="post">--}}
{{--                    @csrf--}}

{{--                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id ?? ''}}" >--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-lg-8 col-md-6">--}}
{{--                            <div class="d-flex justify-content-between form__order">--}}
{{--                                <h6 class="order-detail__title">Order Code: <span class="text-danger">#{{$order->order_code}}</span></h6>--}}
{{--                                <h6 class="order-detail__title">Status:--}}
{{--                                    @switch($order->status)--}}
{{--                                        @case(0)<span class="text text-secondary">Pending</span>@break--}}
{{--                                        @case(1)<span class="text text-primary">Confirmed</span>@break--}}
{{--                                        @case(2)<span class="text text-primary">Shipping</span>@break--}}
{{--                                        @case(3)<span class="text text-warning">Shipped</span>@break--}}
{{--                                        @case(4)<span class="text text-success">Completed</span>@break--}}
{{--                                        @case(5)<span class="text text-danger">Cancel</span>@break--}}
{{--                                    @endswitch--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <p>Fist Name<span>*</span></p>--}}
{{--                                        <input type="text" name="first_name" value="{{$order->first_name}}" disabled style="cursor: no-drop">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <p>Last Name<span>*</span></p>--}}
{{--                                        <input type="text" name="last_name" value="{{$order->last_name}}" disabled style="cursor: no-drop">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="checkout__input">--}}
{{--                                <p>Country<span>*</span></p>--}}
{{--                                <input type="text" name="country" value="{{$order->country}}" disabled style="cursor: no-drop">--}}
{{--                            </div>--}}
{{--                            <div class="checkout__input">--}}
{{--                                <p>Street Address<span>*</span></p>--}}
{{--                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="street_address" value="{{$order->street_address}}" disabled style="cursor: no-drop">--}}
{{--                            </div>--}}
{{--                            <div class="checkout__input">--}}
{{--                                <p>Town/City<span>*</span></p>--}}
{{--                                <input type="text" name="town_city" value="{{$order->town_city}}" disabled style="cursor: no-drop">--}}
{{--                            </div>--}}
{{--                            <div class="checkout__input">--}}
{{--                                <p>Postcode / ZIP<span>*</span></p>--}}
{{--                                <input type="text" name="postcode_zip" value="{{$order->postcode_zip}}" disabled style="cursor: no-drop">--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <p>Phone<span>*</span></p>--}}
{{--                                        <input type="text" name="phone" value="{{$order->phone}}" disabled style="cursor: no-drop">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <p>Email<span>*</span></p>--}}
{{--                                        <input type="email" name="email" value="{{$order->email}}" disabled style="cursor: no-drop">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h6 class="shipping__title">Shipping Method</h6>--}}
{{--                            <p class="shipping shipping-note">NOTE: Delivery times may vary due to location and other factors. Thank you, we hope you understand.</p>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <div class="custom-input">--}}
{{--                                            <input type="radio" id="radio" name="shipping_method" value="Standard Shipping" {{$order->shipping_method == 'Standard Shipping' ? 'checked' : ''}} disabled />--}}
{{--                                            <label for="radio" style="cursor: no-drop !important;">--}}
{{--                                                <span class="check-mark"></span>--}}
{{--                                                <div class="content">--}}
{{--                                                    <div class="text-container">--}}
{{--                                                        <div class="title">Standard Shipping</div>--}}
{{--                                                        <div class="description">Estimated delivery in 3-5 business days</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="shipping-price">$10</div>--}}
{{--                                                </div>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <div class="custom-input">--}}
{{--                                            <input type="radio" id="option" value="Express Shipping" name="shipping_method" {{$order->shipping_method == 'Express Shipping' ? 'checked' : ''}} disabled />--}}
{{--                                            <label for="option" style="cursor: no-drop !important;">--}}
{{--                                                <span class="check-mark"></span>--}}
{{--                                                <div class="content">--}}
{{--                                                    <div class="text-container">--}}
{{--                                                        <div class="title">Express Shipping</div>--}}
{{--                                                        <div class="description">Estimated delivery in 1-2 business days</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="shipping-price">$30</div>--}}
{{--                                                </div>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="checkout__order">--}}
{{--                                <h4 class="order__title">Your order</h4>--}}
{{--                                <div class="checkout__order__products">Product <span>Total</span></div>--}}
{{--                                <ul class="checkout__total__products">--}}
{{--                                    @foreach($order->orderDetails as $orderDetail)--}}
{{--                                        <li>--}}
{{--                                            <a class="my-order__name" href="{{url("/shop/product/{$orderDetail->product->slug}")}}">{{ $orderDetail->product->name }} x{{ $orderDetail->qty }}</a>--}}
{{--                                            <span>${{ number_format($orderDetail->total, 2, '.', '') }}</span>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                                <ul class="checkout__total__all">--}}
{{--                                    <li>Subtotal <span>${{ number_format($subtotal, 2, '.', '') }}</span></li>--}}
{{--                                    <li>VAT 10% <span>${{ number_format($vatAmount, 2, '.', '') }}</span></li>--}}
{{--                                    <li>Shipping <span>${{ number_format($shippingFee, 2, '.', '') }}</span></li>--}}
{{--                                    <li>Total <span>${{ number_format($total, 2, '.', '') }}</span></li>--}}
{{--                                </ul>--}}
{{--                                <div class="checkout__input__checkbox">--}}
{{--                                    <label for="payment" style="cursor: no-drop">--}}
{{--                                        COD--}}
{{--                                        <input name="payment_method" type="radio" id="payment" value="COD" {{$order->payment_method == 'COD' ? 'checked' : ''}} disabled>--}}
{{--                                        <span class="checkmark"></span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="checkout__input__checkbox">--}}
{{--                                    <label for="paypal" style="cursor: no-drop">--}}
{{--                                        Paypal--}}
{{--                                        <input name="payment_method" type="radio" id="paypal" value="PayPal" {{$order->payment_method == 'PayPal' ? 'checked' : ''}} disabled>--}}
{{--                                        <span class="checkmark"></span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="checkout__input__checkbox">--}}
{{--                                    <label for="MoMo" style="cursor: no-drop">--}}
{{--                                        MoMo--}}
{{--                                        <input name="payment_method" type="radio" id="MoMo" value="MoMo" {{$order->payment_method == 'MoMo' ? 'checked' : ''}} disabled>--}}
{{--                                        <span class="checkmark"></span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Checkout Section End -->--}}
{{--@endsection--}}



@extends('front.layout.master')
@section('title','Order Detail')
@section('body')
    <!-- Header -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0">
                    <tr class="hiddenMobile">
                        <td height="40"></td>
                    </tr>
                    <tr class="visibleMobile">
                        <td height="30"></td>
                    </tr>

                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                <tr>
                                    <td>
                                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                            <tbody>
                                            <tr>
                                                <td align="left"><img src="front/img/logo.png" width="150" alt="logo" border="0" /></td>
                                            </tr>
                                            <tr class="visibleMobile">
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left">
                                                    Shop Runner.<br />
                                                    8 Tôn Thất Thuyết, Mỹ Đình, <br />
                                                    Nam Từ Liêm, Hà Nội, Việt Nam.<br />
                                                    Phone: 099 999 9999.
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                            <tbody>
                                            <tr class="visibleMobile">
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td height="5"></td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="
                                                                    font-size: 21px;
                                                                    color: #ff0000;
                                                                    letter-spacing: -1px;
                                                                    font-family: 'Open Sans', sans-serif;
                                                                    line-height: 1;
                                                                    vertical-align: top;
                                                                    text-align: right;
                                                                "
                                                >
                                                    Invoice
                                                </td>
                                            </tr>
                                            <tr></tr>
                                            <tr class="hiddenMobile">
                                                <td height="50"></td>
                                            </tr>
                                            <tr class="visibleMobile">
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right"
                                                >
                                                    <small style="color: #5b5b5b">Order Code: </small
                                                    ><a href="http://127.0.0.1:8000/account/my-order/{{ $order->order_code }}" style="color: #f00">#{{ $order->order_code }}</a><br />
                                                    <small style="color: #5b5b5b">Order date: {{ $order->created_at }}</small>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- /Header -->

    <!-- Information -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tbody>
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                    <tbody>
                    <tr></tr>

                    <tr class="hiddenMobile">
                        <td height="30"></td>
                    </tr>
                    <tr class="visibleMobile">
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                <tr>
                                    <td height="1" colspan="4" style="border-bottom: 1px solid #e4e4e4"></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 30px">
                                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                            <tbody>
                                            <tr>
                                                <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top">
                                                    <strong>BILLING INFORMATION</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="100%" height="10"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top">
                                                    Name: {{ $order->first_name }} {{ $order->last_name }}.<br />
                                                    Phone: {{ $order->phone }}.<br />
                                                    Company name: {{ $order->company_name }}.<br />
                                                    Street address: {{ $order->street_address }}.<br />
                                                    Town/City: {{ $order->town_city }}.<br />
                                                    Country: {{ $order->country }}.<br />
                                                    Postcode / ZIP: {{ $order->postcode_zip }}.<br />
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col" style="text-align: right">
                                            <tbody>
                                            <tr class="visibleMobile">
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top">
                                                    <strong>PAYMENT</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="100%" height="10"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top">
                                                    Payment Method: {{$order->payment_method}}<br />
                                                    Order Status: @switch($order->status) @case(0)<span class="text text-secondary">Pending</span>@break @case(1)<span
                                                        class="text text-success"
                                                    >Confirmed</span
                                                    >@break @case(2)<span class="text text-primary">Shipping</span>@break @case(3)<span class="text text-primary">Shipped</span
                                                    >@break @case(4)<span class="text text-success">Completed</span>@break @case(5)<span class="text text-danger">Cancel</span
                                                    >@break @endswitch
                                                    <br />
                                                    Payment Status: @switch($order->is_paid) @case(0)<span class="text text-secondary">Unpaid</span>@break @case(1)<span
                                                        class="text text-success"
                                                    >Paid</span
                                                    >@break @endswitch
                                                    <br />
                                                    Shipping Method: {{$order->shipping_method}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- Order Details -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tbody>
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                    <tbody>
                    <tr></tr>
                    <tr class="visibleMobile">
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                <tr>
                                    <th
                                        style="
                                                            font-size: 12px;
                                                            font-family: 'Open Sans', sans-serif;
                                                            color: #5b5b5b;
                                                            font-weight: normal;
                                                            line-height: 1;
                                                            vertical-align: top;
                                                            padding: 0 10px 7px 0;
                                                        "
                                        width="52%"
                                        align="left"
                                    >
                                        Products
                                    </th>
                                    <th
                                        style="
                                                            font-size: 12px;
                                                            font-family: 'Open Sans', sans-serif;
                                                            color: #5b5b5b;
                                                            font-weight: normal;
                                                            line-height: 1;
                                                            vertical-align: top;
                                                            padding: 0 0 7px;
                                                        "
                                        align="left"
                                    >
                                        <small>SKU</small>
                                    </th>
                                    <th
                                        style="
                                                            font-size: 12px;
                                                            font-family: 'Open Sans', sans-serif;
                                                            color: #5b5b5b;
                                                            font-weight: normal;
                                                            line-height: 1;
                                                            vertical-align: top;
                                                            padding: 0 0 7px;
                                                        "
                                        align="center"
                                    >
                                        Quantity
                                    </th>
                                    <th
                                        style="
                                                            font-size: 12px;
                                                            font-family: 'Open Sans', sans-serif;
                                                            color: #1e2b33;
                                                            font-weight: normal;
                                                            line-height: 1;
                                                            vertical-align: top;
                                                            padding: 0 0 7px;
                                                        "
                                        align="right"
                                    >
                                        Subtotal
                                    </th>
                                </tr>
                                <tr>
                                    <td height="1" style="background: #bebebe" colspan="4"></td>
                                </tr>
                                @foreach($order->orderDetails as $orderDetail)
                                    <tr>
                                        <td
                                            style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #ff0000; line-height: 18px; vertical-align: top; padding: 10px 0"
                                            class="article"
                                        >
                                            {{ $orderDetail->product->name }}
                                        </td>
                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 18px; vertical-align: top; padding: 10px 0">
                                            <small>{{$orderDetail->product->sku}}</small>
                                        </td>
                                        <td
                                            style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 18px; vertical-align: top; padding: 10px 0"
                                            align="center"
                                        >
                                            {{ $orderDetail->qty}}
                                        </td>
                                        <td
                                            style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33; line-height: 18px; vertical-align: top; padding: 10px 0"
                                            align="right"
                                        >
                                            ${{ $orderDetail->total }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="1" colspan="4" style="border-bottom: 1px solid #e4e4e4"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- /Order Details -->
    <!-- Total -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tbody>
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                    <tbody>
                    <tr>
                        <td>
                            <!-- Table Total -->
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                <tr>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">
                                        Subtotal
                                    </td>
                                    <td
                                        style="
                                                            font-size: 12px;
                                                            font-family: 'Open Sans', sans-serif;
                                                            color: #646a6e;
                                                            line-height: 22px;
                                                            vertical-align: top;
                                                            text-align: right;
                                                            white-space: nowrap;
                                                        "
                                        width="80"
                                    >
                                        ${{number_format($subtotal, 2, '.', '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">
                                        VAT 10%
                                    </td>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">
                                        ${{number_format($vatAmount, 2, '.', '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">
                                        Shipping
                                    </td>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">
                                        ${{number_format($shippingFee, 2, '.', '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">
                                        Total
                                    </td>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">
                                        ${{number_format($total, 2, '.', '') }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- /Table Total -->
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- /Total -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px">
                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                <tr>
                                    <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left">
                                        Hello <strong>{{ $order->first_name }} {{ $order->last_name }},</strong> <br />Thank you for shopping from our store and for your order. it is really
                                        awesome to have you as one of our paid users. We hope that you will be satisfied with our products and services, if you ever have any questions,
                                        suggestions or concerns please do not hesitate to contact us. <br /><br />

                                        <br />Best Regards, <br />Code One Min Team <br />
                                        <br />
                                        Email: <a href="mailto:codeonemin@gmail.com"></a> codeonemin@gmail.com. <br />
                                        Website: <a href="http://127.0.0.1:8000/">shoprunner.com</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="spacer">
                        <td height="50"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
    </table>
@endsection
