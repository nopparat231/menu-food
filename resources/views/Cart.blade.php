@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (isset($cart_data))
                        @if (Cookie::get('shopping_cart'))
                            @php $total="0" @endphp
                            <div class="shopping-cart">
                                <div class="shopping-cart-table">
                                    <div class="table-responsive">
                                        <div class="col-md-12 text-right mb-3">
                                            <a href="javascript:void(0)" class="clear_cart font-weight-bold">Clear Cart</a>
                                        </div>
                                        <table class="table table-bordered my-auto  text-center">
                                            <thead>
                                                <tr>
                                                    <th class="cart-description">Image</th>
                                                    <th class="cart-product-name">Product Name</th>
                                                    <th class="cart-price">Price</th>
                                                    <th class="cart-qty">Quantity</th>
                                                    <th class="cart-total">Grandtotal</th>
                                                    <th class="cart-romove">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody class="my-auto">

                                                @foreach ($cart_data as $data)
                                                    <tr class="cartpage">
                                                        <input type="hidden" name="product_id" class="product_id"
                                                            value="{{ $data['id'] }}">
                                                        <td class="cart-image">
                                                            <a class="entry-thumbnail" href="javascript:void(0)">
                                                                <img src="{{ $data['menu_image'] }}" width="70vh" alt="">
                                                            </a>
                                                        </td>
                                                        <td class="cart-product-name-info">
                                                            <h4 class='cart-product-description'>
                                                                {{ $data['menu_name'].$data['id'] }}
                                                            </h4>
                                                        </td>
                                                        <td class="cart-product-sub-total">
                                                            <span
                                                                class="cart-sub-total-price">{{ number_format($data['menu_price'], 2) }}</span>
                                                        </td>
                                                        <td class="cart-product-quantity" width="130px">
                                                            <div class="input-group quantity">
                                                                <div class="input-group-prepend decrement-btn changeQuantity"
                                                                    style="cursor: pointer">
                                                                    <span class="input-group-text">-</span>
                                                                </div>
                                                                <input type="text" class="qty-input form-control"
                                                                    maxlength="2" max="10"
                                                                    value="{{ $data['order_quantity'] }}">
                                                                <div class="input-group-append increment-btn changeQuantity"
                                                                    style="cursor: pointer">
                                                                    <span class="input-group-text">+</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="cart-product-grand-total">
                                                            <span
                                                                class="cart-grand-total-price">{{ number_format($data['order_quantity'] * $data['menu_price'], 2) }}</span>
                                                        </td>
                                                        <td style="font-size: 20px;">
                                                            <button type="button"
                                                                class="delete_cart_data btn btn-outline-danger">
                                                                <i class="bi bi-trash"></i> Delete
                                                            </button>
                                                        </td>
                                                        @php $total = $total + ($data["order_quantity"] * $data["menu_price"]) @endphp
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table><!-- /table -->
                                    </div>
                                </div><!-- /.shopping-cart-table -->
                                <div class="row">

                                    <div class="col-md-8 col-sm-12 estimate-ship-tax">
                                        <div>
                                            <a href="{{ url('/') }}"
                                                class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a>
                                        </div>
                                    </div><!-- /.estimate-ship-tax -->

                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="cart-shopping-total">

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="cart-grand-name">ราคารวม</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="cart-grand-price">

                                                        <span class="cart-grand-price-viewajax">
                                                            <b>{{ number_format($total, 2) }} บาท</b>
                                                        </span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="cart-checkout-btn text-center">
                                                        @if (Auth::check())
                                                            <button id="add-to-orders-btn"
                                                                class="btn btn-success btn-block checkout-btn add-to-orders-btn">
                                                                ยืนยันคำสั่งซื้อ
                                                            </button>
                                                        @else
                                                            <a href="{{ url('login') }}"
                                                                class="btn btn-success btn-block checkout-btn">
                                                                เข้าสู่ระบบเพื่อสั่งซื้อ
                                                            </a>
                                                            {{-- you add a pop modal for making a login --}}
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- /.shopping-cart -->
                        @endif
                    @else
                        <div class="row">
                            <div class="col-md-12 mycard py-5 text-center">
                                <div class="mycards">
                                    <h4>Your cart is currently empty.</h4>
                                    <a href="{{ url('/') }}"
                                        class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <input type="hidden" id="shopping_cart" value="{{ Cookie::get('shopping_cart') }}">
                    <input type="hidden" name="user_id" id="user_id" class="user_id" value="{{ Auth::check() ? Auth::user()->id : null }}">

                </div>
            </div> <!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection

<script type="text/javascript">

</script>
