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
                            @if ($menu->restaurant_id == $gmenus[$g]->restaurant_id)
                                <h2 style="margin-bottom: 0px">{{ $menu->restaurant_name }}</h2>
                            @break
                        @endif
                    @endforeach

                    <hr style="margin-top: 0px">

                    @foreach ($menus as $menu)

                        @if ($menu->restaurant_id == $gmenus[$g]->restaurant_id)

                            <div class="product_data">
                                <div class="card mb-3" style="max-width: 540rem;">
                                    <div class="row g-0">
                                        <div class="col-md-2">
                                            <img src="{{ $menu->menu_img }}" style="width: 100%;height: 100%;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $menu->menu_name }}</h5>
                                                <p class="card-text"><small class="text-muted">จำนวนคิวรอ <b
                                                            id="orders_status" data-id="1">1</b> คิว</small></p>
                                                <input type="hidden" name="menu_id" class="menu_id"
                                                    value="{{ $menu->menu_id }}">
                                                <input type="hidden" name="menu_name" class="menu_name"
                                                    value="{{ $menu->menu_name }}">
                                                <input type="hidden" class="qty-input" value="1">
                                                <button type="button" disabled
                                                    class="add-to-cart-btn btn btn-primary">รอทำอาหาร</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach

                    @endfor

                </div>
            </div>
        </div>
    </section>

@endsection
