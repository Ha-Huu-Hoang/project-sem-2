@extends('front.layout.master')
@section('title','Thank You')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Thank You</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <a href="{{url("/checkout")}}">Checkout</a>
                            <span>Thank You</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout">
        <div class="container">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col" >Product Name</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Order date</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><img class="img-thumbnail" width="100" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/0846e90b15144861b33dacf500e3cfd1_9366/Kaptir_2.0_Shoes_White_H00276_01_standard.jpg" alt="..."></td>
                        <td>Adidas Kaptir</td>
                        <td>2</td>
                        <td>$35.00</td>
                        <td>PayPal</td>
                        <td>2023-06-14 07:04:09</td>
                    </tr>
                     <tr>
                            <th scope="row">2</th>
                            <td><img class="img-thumbnail" width="100" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/0846e90b15144861b33dacf500e3cfd1_9366/Kaptir_2.0_Shoes_White_H00276_01_standard.jpg" alt="..."></td>
                            <td>Adidas Kaptir</td>
                            <td>1</td>
                            <td>$35.00</td>
                            <td>PayPal</td>
                            <td>2023-06-14 07:04:09</td>
                        </tr>
                     <tr>
                        <th scope="row">3</th>
                        <td><img class="img-thumbnail" width="100" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/0846e90b15144861b33dacf500e3cfd1_9366/Kaptir_2.0_Shoes_White_H00276_01_standard.jpg" alt="..."></td>
                        <td>Adidas Kaptir</td>
                        <td>1</td>
                        <td>$35.00</td>
                        <td>PayPal</td>
                        <td>2023-06-14 07:04:09</td>
                    </tr>
                </tbody>
            </table>
        </div>
    <section
@endsection
