@extends('front.layout.master')
@section('title','Cart')
@section('body')

    @if(Cart::count()>0)
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            <a href="{{url('/shop')}}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                                <tr data-rowId="{{$cart->rowId}}">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            @if(isset($cart->options['images']) && count($cart->options['images']) > 0)
                                                <img src="{{$cart->options['images'][0]->path}}" alt="" style="width: 90px;height: 90px; object-fit: cover">
                                            @endif

                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$cart->name}}</h6>
                                            <h5>${{number_format($cart->price,2)}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="{{$cart->qty}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">${{number_format($cart->price ,2)}}</td>
                                    <td class="cart__close"><a href="cart/delete/{{$cart->rowId}}"><i class="fa fa-close"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{url('/shop')}}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>${{$subtotal}}</span></li>
                            <li>VAT 10% <span>${{ number_format($vatAmount, 2, '.', '') }}</span></li>
                            <li>Total <span>${{ number_format($total, 2, '.', '') }}</span></li>
                        </ul>
                        <a href="{{url("/checkout")}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    @else
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <p>There are no products in the cart</p>
                </div>
            </div>
        </section>
    @endif
@endsection
