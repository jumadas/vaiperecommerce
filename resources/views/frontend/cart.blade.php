@extends('layouts.app_frontend')
@section('content')


    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Cart</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route ('frontend') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('cartupdate') }}" method="post">
                                        @csrf
                                    <?php
                                      $cart_total=0;
                                      $flag=false;
                                    ?>


                                    @forelse (allcarts() as $cart )
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px"
                                                        src="{{ asset('uploads/product_photos') }}/{{ $cart->relationtoproduct->product_photo }}" alt="" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{ $cart->relationtoproduct->product_name  }}
                                                <br>
                                                Vendor Name: {{ getvendorname($cart->product_id) }}
                                                <br>
                                                Status:
                                                @if ($cart->amount > available_quantity($cart->product_id))
                                                   <span class="text-danger">Stock Out</span>
                                                   <?php
                                                        $flag=true;
                                                   ?>
                                                @else
                                                Available
                                                @endif
                                            </a></td>
                                            <td class="product-price-cart"><span class="amount">$ {{ $cart->relationtoproduct->product_price }}</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton[{{ $cart->id }}]"
                                                        value="{{$cart->amount }}" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                ${{$cart->amount * $cart->relationtoproduct->product_price }}
                                                <?php
                                                    $cart_total += ($cart->amount * $cart->relationtoproduct->product_price);
                                                ?>
                                            </td>
                                            <td class="product-remove">
                                                <a href="{{ route('cartremove',$cart->id) }}"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td >Your Cart is Empty Now</td>
                                        </tr>

                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{ route('frontend') }}">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button type="submit">Update Shopping Cart</button>
                                        </form>
                                        @auth

                                        <a href="{{ route('clearshoppingcart',auth()->id()) }}">Clear Shopping Cart</a>

                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        {{-- <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <div class="tax-select-wrapper">
                                        <div class="tax-select">
                                            <label>
                                                * Country
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Region / State
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select mb-25px">
                                            <label>
                                                * Zip/Postal Code
                                            </label>
                                            <input type="text" />
                                        </div>
                                        <button class="cart-btn-2" type="submit">Get A Quote</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-6 col-md-6 mb-lm-30px">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    <form>
                                        <input type="text" name="coupon_name" value="{{ ($coupon_name)?$coupon_name:'' }}" />
                                        <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                    </form>
                                    @if (session('coupon_err'))
                                        <div class="alert alert-danger mt-2">
                                            {{ session('coupon_err') }}
                                        </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-md-30px">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                @php
                                    Session::put('s_cart_total',$cart_total);
                                    Session::put('s_discount_total',$discount_total);
                                @endphp
                                <h5>Carts Total <span>${{ $cart_total }}</span></h5>
                                <h5>Discount Total(
                                    @if ($coupon_name)
                                        {{ $coupon_name }}
                                    @else
                                        N/A
                                    @endif
                                    )
                                  <span>${{ $discount_total }}</span></h5>
                                <h5>Sub Total(approx.) <span id='sub_total'>{{round( $cart_total -$discount_total )}}</span><span>$</span></h5>
                                <div class="total-shipping">
                                    <h5>Total shipping</h5>
                                    <ul>
                                        <li><input  id='shipping_btn_1'type="radio" name='shipping'/> Standard <span>$20.00</span></li>
                                        <li><input  id='shipping_btn_2'type="radio" name='shipping'/> Express <span>$30.00</span></li>
                                    </ul>
                                </div>
                                <h4 class="grand-totall-title">Grand Total<span id="grand_total">{{round( $cart_total -$discount_total )}}</span><span>$</span></h4>

                                @if ($flag)
                                     <div class="alert alert-danger">
                                        Please Remove Stock Out Product
                                    </div>
                                @else
                                    <a id='checkout_btn' class="d-none" href="{{ route('checkout') }}">Proceed to Checkout</a>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection
@section('footer_script')
    <script>
        $('#shipping_btn_1').click(function(){
            // alert(parseInt($('#sub_total').html())+20);
            $('#grand_total').html(parseInt($('#sub_total').html())+20);
            $('#checkout_btn').removeClass('d-none');
            @php
                session(['s_shipping'=>30]);
            @endphp
        });
        $('#shipping_btn_2').click(function(){
            // alert(parseInt($('#sub_total').html())+30);
             $('#grand_total').html(parseInt($('#sub_total').html())+30);
             $('#checkout_btn').removeClass('d-none');
            @php
                session(['s_shipping'=>30]);
            @endphp
        });
    </script>

@endsection

