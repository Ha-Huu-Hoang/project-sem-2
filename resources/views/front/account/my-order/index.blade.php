@extends('front.layout.master')
@section('title','My Order')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>My Order</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <span>My Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="shop">
        <div class="container">
            <div class="order-table" style="margin: 50px 0">
                <table class="table table-borderless">
                    <thead class="table-bordered">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">ID</th>
                            <th scope="col">Product</th>
                            <th scope="col">Total</th>
                            <th scope="col">Details</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        @foreach($orders as $order)
                            <tr>
                                <td style="width: 18%">
                                    @if(isset($order->orderDetails) && count($order->orderDetails) > 0)
                                        @foreach($order->orderDetails as $orderDetail)
                                            @if(isset($orderDetail->product) && isset($orderDetail->product->productImages) && count($orderDetail->product->productImages) > 0)
                                                <img src="{{$orderDetail->product->productImages[0]->path}}" alt="..." class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover">
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>#{{$order->id}}</td>
                                <td>
                                    @if(isset($order->orderDetails) && count($order->orderDetails) > 0)
                                        {{$order->orderDetails[0]->product->name}}

                                        @php
                                            $totalQuantity = $order->orderDetails->sum('qty');
                                            $otherProductsCount = $totalQuantity - 1;
                                        @endphp

                                        @if($otherProductsCount > 0)
                                            (and {{$otherProductsCount}} other product{{($otherProductsCount > 1) ? 's' : ''}})
                                        @endif
                                    @endif
                                </td>
                                <th style="color: #E6B81D;">${{ number_format($order->total, 2, '.', '') }}</th>


                                <td><a href="/account/my-order/{{$order->id}}" class="btn btn-primary"><i class="fa fa-info-circle"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <section>
@endsection
