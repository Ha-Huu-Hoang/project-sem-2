/*  ---------------------------------------------------
    Template Name: Male Fashion
    Description: Male Fashion - ecommerce teplate
    Author: Colorib
    Author URI: https://www.colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.product__filter').length > 0) {
            var containerEl = document.querySelector('.product__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Search Switch
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*-----------------------
        Hero Slider
    ------------------------*/
    $(".hero__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_left'><span/>", "<span class='arrow_right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*-------------------
		Radio Btn
	--------------------- */
    $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").on('click', function () {
        $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
		Scroll
	--------------------- */
    $(".nice-scroll").niceScroll({
        cursorcolor: "#0d0d0d",
        cursorwidth: "5px",
        background: "#e5e5e5",
        cursorborder: "",
        autohidemode: true,
        horizrailenabled: false
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview start
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end


    // Uncomment below and use your date //

    /* var timerdate = "2020/12/30" */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hours</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Minutes</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Seconds</p> </div>"));
    });

    /*------------------
		Magnific
	--------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class=" dec qtybtn-detail">-</span>');
    proQty.append('<span class=" inc qtybtn-detail">+</span>');
    proQty.on('click', '.qtybtn-detail', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);


    });

    var proQty = $('.pro-qty-2');
    proQty.prepend('<span class="fa fa-angle-left dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-right inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
        //update cart
        var rowId = $button.parent().find('input').data('rowid');
        updateCart(rowId,newVal);
    });
    /*-------------------
       Range Slider
   --------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max'),
        minValue = rangeSlider.data('min-value') !== '' ? rangeSlider.data('min-value') : minPrice,
        maxValue =rangeSlider.data('max-value') !== '' ? rangeSlider.data('max-value') : maxPrice;

    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minValue, maxValue],
        slide: function (event, ui) {
            minamount.val('$' + ui.values[0]);
            maxamount.val('$' + ui.values[1]);
        }
    });
    minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

    /*------------------
        Achieve Counter
    --------------------*/
    $('.cn_num').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

})(jQuery);

 function addCart(productId) {
     $.ajax({
         type: "GET",
         url:"cart/add",
         data:{productId: productId},
         success: function (response){
         $('.cart-count').text(response['count']);
         $('.price').text('$' + response['total']);

         var row_tbody = $('.shopping__cart__table tbody');
         var row_exitstItem = row_tbody.find("tr[data-rowId='"+ response['cart'].rowId +"']");

         if (row_exitstItem.length){
             row_exitstItem.find('.product__cart__item__text h5').text('$'+response['cart'].price.toFixed(2));

         }else {
             var newItem =
                 '                                   <tr data-rowId="'+ response['cart'].rowId +'">\n' +
                 '                                    <td class="product__cart__item">\n' +
                 '                                        <div class="product__cart__item__pic">\n' +
                 '                                            @if(isset($cart->options[\'images\']) && count($cart->options[\'images\']) > 0)\n' +
                 '                                                <img src="'+ response['cart'].options.images[0].path +'" alt="" style="width: 90px;height: 90px; object-fit: cover">\n' +
                 '                                            @endif\n' +
                 '\n' +
                 '                                        </div>\n' +
                 '                                        <div class="product__cart__item__text">\n' +
                 '                                            <h6>'+ response['cart'].name+'</h6>\n' +
                 '                                            <h5>$'+ response['cart'].price.toFixed(2)+'</h5>\n' +
                 '                                        </div>\n' +
                 '                                    </td>\n' +
                 '                                    <td class="quantity__item">\n' +
                 '                                        <div class="quantity">\n' +
                 '                                            <div class="pro-qty-2">\n' +
                 '                                                <input type="text" value="{{$cart->qty}}">\n' +
                 '                                            </div>\n' +
                 '                                        </div>\n' +
                 '                                    </td>\n' +
                 '                                    <td class="cart__price">$\'+ response[\'cart\'].price.toFixed(2)+</td>\n' +
                 '                                    <td class="cart__close"><i onclick="removeCart(\''+ response['cart'] +'\')" class="fa fa-close"></i></td>\n' +
                 '                                </tr>';
             row_tbody.append(newItem);
         }
         alert('Add successful!\nProduct: ' + response['cart'].name)
             console.log(response);
         },
         error:function (response){
            alert('Add failed');
            console.log(response);
         },
     });

}

function removeCart(rowId){
    $.ajax({
        type: "GET",
        url:"cart/delete",
        data:{rowId: rowId},
        success: function (response){
            // xử lý cart trong master.blade,php
            $('.cart-count').text(response['count']);
            $('.price').text('$' + response['total']);

            var row_tbody = $('.shopping__cart__table tbody');
            var row_exitstItem = row_tbody.find("tr[data-rowId='"+ rowId +"']");
            row_exitstItem.remove();
            // xử lý cart trong cart.blade.php
            var cart_tbody =$('.shopping__cart__table tbody');
            var cart_exitstItem = cart_tbody.find("tr[data-rowId='"+ rowId  +"']");
            cart_exitstItem.remove();

            $('.cart__total ul li:first-child span').text('0');
            $('.cart__total ul li:last-child span').text('0');
            $('.cart__total ul li:nth-child(2) span').text('0');

            alert('Delete successful!\nProduct: ' + response['cart'].name)
            console.log(response);
        },
        error:function (response){
            alert('Delete failed');
            console.log(response);
        },
    });
}

function destroyCart(){
    $.ajax({
        type: "GET",
        url:"cart/destroy",
        data:{},
        success: function (response){
            // xử lý cart trong master.blade,php
            $('.cart-count').text('0');
            $('.price').text('0');

            var row_tbody = $('.shopping__cart__table tbody');
            row_tbody.children().remove();
            // xử lý cart trong cart.blade.php
            var cart_tbody =$('.shopping__cart__table tbody');
            cart_tbody.children().remove();

            $('.cart__total ul li:first-child span').text('0');
            $('.cart__total ul li:last-child span').text('0');
            $('.cart__total ul li:nth-child(2) span').text('0');






            alert('Delete successful!\nProduct: ' + response['cart'].name)
            console.log(response);
        },
        error:function (response){
            alert('Delete failed');
            console.log(response);
        },
    });
}

function calculateVAT(subtotal, vatRate) {
    var vatAmount = (subtotal * vatRate) / 100;
    return parseFloat(vatAmount.toFixed(2));
}

function updateCart(rowId,qty){
    $.ajax({
        type: "GET",
        url:"cart/update",
        data:{rowId: rowId ,qty: qty},
        success: function (response){
            // xử lý cart trong master.blade,php
            $('.cart-count').text(response['count']);
            $('.price').text('$'+response['total']);

            var row_tbody = $('.shopping__cart__table tbody');
            var row_exitstItem = row_tbody.find("tr[data-rowId='"+ rowId +"']");
            if (qty === 0){
                row_exitstItem.remove();
            }else {
                row_exitstItem.find('.price').text('$'+response['cart'].price.toFixed(2)+'x'+response['cart'].qty);
            }

            // Handle cart in cart.blade.php
            var cart_tbody = $('.shopping__cart__table tbody');
            var cart_exitstItem = cart_tbody.find("tr[data-rowId='" + rowId + "']");
            if (qty === 0) {
                cart_exitstItem.remove();
            } else {
                var totalPrice = response['cart'].price * response['cart'].qty;
                var formattedPrice = totalPrice.toFixed(2).replace(',', '');
                cart_exitstItem.find('.cart__price').text('$' + formattedPrice);
            }

            $('.cart__total ul li:first-child span').text('$' + response['subtotal']);

            var vatRate = 10; // VAT 10%
            var subtotal = parseFloat(response['subtotal'].replace(',', ''));
            var vatAmount = calculateVAT(subtotal, vatRate);

            var total = subtotal + vatAmount;

            // Update subtotal, VAT and total values in cart total
            $('.cart__total ul li:first-child span').text('$' + subtotal.toFixed(2));
            $('.cart__total ul li:nth-child(2) span').text('$' + vatAmount.toFixed(2));
            $('.cart__total ul li:last-child span').text('$' + total.toFixed(2));

        },
        error: function (response) {
            alert('Update failed');
            console.log(response);
        },

    });
}

//Search Navbar
const searchIcon = document.getElementById("search-icon");
const searchInputContainer = document.querySelector(".search-input-container");
const searchInput = document.getElementById("search-input");

searchIcon.addEventListener("click", function () {
    searchInputContainer.classList.toggle("show-input");
    if (searchInputContainer.classList.contains("show-input")) {
        searchInput.focus();
    } else {
        searchInput.blur();
    }
});

document.addEventListener("click", function (event) {
    const targetElement = event.target;
    if (!targetElement.closest(".search-container")) {
        searchInputContainer.classList.remove("show-input");
        searchInput.blur();
    }
});
