@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <H1 style="text-align: center"><b>My Orders</b></H1>
                    <hr>

                    @for ($g = 0; $g < count($gmenus); $g++) <br>

                        @foreach ($menus as $menu)
                            @if ($menu->res_uid == Auth::user()->id)
                                @if ($menu->restaurant_id == $gmenus[$g]->restaurant_id)
                                    <h2 style="margin-bottom: 0px">{{ $menu->restaurant_name }}</h2>
                                @break
                            @endif
                        @elseif ($menu->or_uid == Auth::user()->id)
                            @if ($menu->restaurant_id == $gmenus[$g]->restaurant_id)
                                <h2 style="margin-bottom: 0px">{{ $menu->restaurant_name }}</h2>
                            @break
                        @endif
                    @endif
                    @endforeach

                    {{-- <hr style="margin-top: 0px"> --}}

                    @foreach ($menus as $menu)

                        @if ($menu->restaurant_id == $gmenus[$g]->restaurant_id)
                            @if ($menu->res_uid == Auth::user()->id)
                                <div class="product_data">
                                    <div class="card mb-3" style="max-width: 540rem;">
                                        <div class="row g-0">
                                            <div class="col-md-2">
                                                <img src="{{ $menu->menu_img }}" style="width: 100%;height: 100%;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{ $menu->menu_name }}</h4>
                                                    <p class="card-text">
                                                        <b>จำนวณ : {{ $menu->order_quantity }}</b>
                                                        <br>
                                                        <b>ราคา :
                                                            @php
                                                                $cp = $menu->price * $menu->order_quantity;
                                                            @endphp
                                                            {{ $cp }} </b>
                                                        <br>
                                                        <b>ผู้สั่งซื้อ : {{ $menu->users_name }}</b>
                                                        <br>
                                                        <b>เวลาโดยประมาณ {{ $menu->orders_time }} นาที</b>
                                                        <input type="hidden" name="users_provider_id"
                                                            class="users_provider_id"
                                                            value="{{ $menu->users_provider_id }}">
                                                    <h5 class="text-muted">
                                                        <b>
                                                            @if ($menu->orders_status == 2)
                                                                <p style="color: hotpink"> รับออเดอร์แล้ว
                                                                    กำลังทำอาหาร
                                                                </p>
                                                            @elseif ($menu->orders_status == 3)
                                                                <p style="color: green"> ทำอาหารเสร็จแล้ว</p>
                                                            @elseif ($menu->orders_status == 4)
                                                                <p style="color: rgb(0, 81, 156)"> ลูกค้ามารับอาหารแล้ว</p>     

                                                            @elseif ($menu->orders_status == 0)
                                                                <p style="color: red"> ยกเลิกออเดอร์</p>
                                                            @elseif ($menu->orders_status == 5)
                                                                <p style="color: rgb(194, 202, 118)"> จ่ายเงินแล้ว <a
                                                                        href="{{ 'slip/' . $menu->orders_slip }}"
                                                                        target="_bank">ดูสลิป</a></p>

                                                            @else
                                                                <p style="color: rgb(164, 205, 238)">

                                                                    รอรับออกเดอร์
                                                                    ...
                                                                </p>
                                                            @endif


                                                        </b>
                                                    </h5>
                                                    </p>
                                                    <input type="hidden" name="menu_id" class="menu_id"
                                                        value="{{ $menu->menu_id }}">
                                                    <input type="hidden" name="menu_name" class="menu_name"
                                                        value="{{ $menu->menu_name }}">
                                                    <input type="hidden" name="orders_id" class="orders_id"
                                                        value="{{ $menu->orders_id }}">
                                                    <input type="hidden" class="qty-input" value="1">
                                                    {{-- <button type="button" disabled
                                                    class="add-to-cart-btn btn btn-primary">รอทำอาหาร
                                                </button> --}}


                                                   {{-- <button type="button" class="con-order-btn btn btn-lite"
                                                        style="background-color: hotpink;color: white">รับออเดอร์
                                                    </button> --}}
                                                    <a href="/TimeOrder?id={{ $menu->orders_id }}" class=" btn btn-lite"
                                                        style="background-color: hotpink;color: white">รับออเดอร์</a>
                                                    <button type="button" class="done-order-btn btn btn-lite"
                                                        style="background-color: green;color: white">ทำอาหารเสร็จแล้ว
                                                    </button>
                                                    <button type="button" class="can-order-btn btn btn-danger">ยกเลิกออเดอร์
                                                    </button>
                                                    <button type="button" class="del-order-btn btn btn-dark">ลูกค้ามารับอาหารแล้ว
                                                    </button>



                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @elseif ($menu->or_uid == Auth::user()->id)
                                <div class="product_data">
                                    <div class="card mb-3" style="max-width: 540rem;">
                                        <div class="row g-0">
                                            <div class="col-md-2">
                                                <img src="{{ $menu->menu_img }}" style="width: 100%;height: 100%;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{ $menu->menu_name }}</h4>
                                                    <p class="card-text">
                                                        <b>จำนวณ : {{ $menu->order_quantity }}</b>
                                                        <br>
                                                        <b>ราคา :
                                                            @php
                                                                $cp = $menu->price * $menu->order_quantity;
                                                            @endphp
                                                            {{ $cp }} </b>
                                                        <br>
                                                        <b>ผู้สั่งซื้อ : {{ $menu->users_name }}</b>
                                                        <br>
                                                        <b>เวลาโดยประมาณ {{ $menu->orders_time }} นาที</b>
                                                        <input type="hidden" name="users_provider_id"
                                                            class="users_provider_id"
                                                            value="{{ $menu->users_provider_id }}">
                                                    <h5 class="text-muted">
                                                        <b>
                                                            @if ($menu->orders_status == 2)
                                                                <p style="color: hotpink"> รับออเดอร์แล้ว
                                                                    กำลังทำอาหาร
                                                                </p>
                                                            @elseif ($menu->orders_status == 3)
                                                                <p style="color: green"> ทำอาหารเสร็จแล้ว</p>
                                                            @elseif ($menu->orders_status == 4)
                                                                <p style="color: rgb(0, 81, 156)"> ลูกค้ามารับอาหารแล้ว</p>    

                                                            @elseif ($menu->orders_status == 0)
                                                                <p style="color: red"> ยกเลิกออเดอร์</p>
                                                            @elseif ($menu->orders_status == 5)
                                                                <p style="color: rgb(194, 202, 118)"> จ่ายเงินแล้ว</p>
                                                            @else
                                                                <a href="{{ url('file-upload') . '?id=' . $menu->orders_id. '&res_id=' . $menu->res_uid . '&price=' . $menu->price}}"
                                                                    class=" btn btn-info">รอจ่ายเงิน</a>
                                                            @endif


                                                        </b>
                                                    </h5>
                                                    </p>
                                                    <input type="hidden" name="menu_id" class="menu_id"
                                                        value="{{ $menu->menu_id }}">
                                                    <input type="hidden" name="menu_name" class="menu_name"
                                                        value="{{ $menu->menu_name }}">
                                                    <input type="hidden" name="orders_id" class="orders_id"
                                                        value="{{ $menu->orders_id }}">
                                                    <input type="hidden" class="qty-input" value="1">
                                                    {{-- <button type="button" disabled
                                                    class="add-to-cart-btn btn btn-primary">รอทำอาหาร
                                                </button> --}}
                                                    @if ($menu->res_uid == Auth::user()->id)

                                                        <button type="button" class="con-order-btn btn btn-lite"
                                                            style="background-color: hotpink;color: white">รับออเดอร์
                                                        </button>
                                                        <button type="button" class="done-order-btn btn btn-lite"
                                                            style="background-color: green;color: white">ทำอาหารเสร็จแล้ว
                                                        </button>
                                                        <button type="button"
                                                            class="can-order-btn btn btn-danger">ยกเลิกออเดอร์
                                                        </button>
                                                        <button type="button" class="del-order-btn btn btn-dark">ลูกค้ามารับอาหารแล้ว
                                                        </button>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endif
                    @endforeach

                    @endfor

                </div>
            </div>
        </div>
    </section>

@endsection
