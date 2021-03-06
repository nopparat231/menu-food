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
                                                        <b>??????????????? : {{ $menu->order_quantity }}</b>
                                                        <br>
                                                        <b>???????????? :
                                                            @php
                                                                $cp = $menu->price * $menu->order_quantity;
                                                            @endphp
                                                            {{ $cp }} </b>
                                                        <br>
                                                        <b>????????????????????????????????? : {{ $menu->users_name }}</b>
                                                        <br>
                                                        <b>??????????????????????????????????????? {{ $menu->orders_time }} ????????????</b>
                                                        <input type="hidden" name="users_provider_id"
                                                            class="users_provider_id"
                                                            value="{{ $menu->users_provider_id }}">
                                                    <h5 class="text-muted">
                                                        <b>
                                                            @if ($menu->orders_status == 2)
                                                                <p style="color: hotpink"> ??????????????????????????????????????????
                                                                    ????????????????????????????????????
                                                                </p>
                                                            @elseif ($menu->orders_status == 3)
                                                                <p style="color: green"> ????????????????????????????????????????????????</p>
                                                            @elseif ($menu->orders_status == 4)
                                                                <p style="color: rgb(0, 81, 156)"> ????????????????????????????????????????????????????????????</p>     

                                                            @elseif ($menu->orders_status == 0)
                                                                <p style="color: red"> ???????????????????????????????????????</p>
                                                            @elseif ($menu->orders_status == 5)
                                                                <p style="color: rgb(194, 202, 118)"> ???????????????????????????????????? <a
                                                                        href="{{ 'slip/' . $menu->orders_slip }}"
                                                                        target="_bank">??????????????????</a></p>

                                                            @else
                                                                <p style="color: rgb(164, 205, 238)">

                                                                    ???????????????????????????????????????
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
                                                    class="add-to-cart-btn btn btn-primary">???????????????????????????
                                                </button> --}}


                                                   {{-- <button type="button" class="con-order-btn btn btn-lite"
                                                        style="background-color: hotpink;color: white">??????????????????????????????
                                                    </button> --}}
                                                    <a href="/TimeOrder?id={{ $menu->orders_id }}" class=" btn btn-lite"
                                                        style="background-color: hotpink;color: white">??????????????????????????????</a>
                                                    <button type="button" class="done-order-btn btn btn-lite"
                                                        style="background-color: green;color: white">????????????????????????????????????????????????
                                                    </button>
                                                    <button type="button" class="can-order-btn btn btn-danger">???????????????????????????????????????
                                                    </button>
                                                    <button type="button" class="del-order-btn btn btn-dark">????????????????????????????????????????????????????????????
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
                                                        <b>??????????????? : {{ $menu->order_quantity }}</b>
                                                        <br>
                                                        <b>???????????? :
                                                            @php
                                                                $cp = $menu->price * $menu->order_quantity;
                                                            @endphp
                                                            {{ $cp }} </b>
                                                        <br>
                                                        <b>????????????????????????????????? : {{ $menu->users_name }}</b>
                                                        <br>
                                                        <b>??????????????????????????????????????? {{ $menu->orders_time }} ????????????</b>
                                                        <input type="hidden" name="users_provider_id"
                                                            class="users_provider_id"
                                                            value="{{ $menu->users_provider_id }}">
                                                    <h5 class="text-muted">
                                                        <b>
                                                            @if ($menu->orders_status == 2)
                                                                <p style="color: hotpink"> ??????????????????????????????????????????
                                                                    ????????????????????????????????????
                                                                </p>
                                                            @elseif ($menu->orders_status == 3)
                                                                <p style="color: green"> ????????????????????????????????????????????????</p>
                                                            @elseif ($menu->orders_status == 4)
                                                                <p style="color: rgb(0, 81, 156)"> ????????????????????????????????????????????????????????????</p>    

                                                            @elseif ($menu->orders_status == 0)
                                                                <p style="color: red"> ???????????????????????????????????????</p>
                                                            @elseif ($menu->orders_status == 5)
                                                                <p style="color: rgb(194, 202, 118)"> ????????????????????????????????????</p>
                                                            @else
                                                                <a href="{{ url('file-upload') . '?id=' . $menu->orders_id. '&res_id=' . $menu->res_uid . '&price=' . $menu->price * $menu->order_quantity}}"
                                                                    class=" btn btn-info">??????????????????????????????</a>
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
                                                    class="add-to-cart-btn btn btn-primary">???????????????????????????
                                                </button> --}}
                                                    @if ($menu->res_uid == Auth::user()->id)

                                                        <button type="button" class="con-order-btn btn btn-lite"
                                                            style="background-color: hotpink;color: white">??????????????????????????????
                                                        </button>
                                                        <button type="button" class="done-order-btn btn btn-lite"
                                                            style="background-color: green;color: white">????????????????????????????????????????????????
                                                        </button>
                                                        <button type="button"
                                                            class="can-order-btn btn btn-danger">???????????????????????????????????????
                                                        </button>
                                                        <button type="button" class="del-order-btn btn btn-dark">????????????????????????????????????????????????????????????
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
