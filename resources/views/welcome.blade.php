@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">

                <div class="card mb-3" style="max-width: 540rem;">
                    <div class="row g-0">
                        <div class="col-md-12" style="text-align: center; max-height: 200px;">
                            <select id='selRest' class="js-example-basic" style="width: 100%;height: 150px;">
                                <option value='0'>-- ค้นหาร้าน --</option>
                            </select>
                        </div>
                    </div>
                </div>


                @for ($g = 0; $g < count($gmenus); $g++) <br>

                    @foreach ($menus as $menu)
                        @if ($menu->restaurant_id == $gmenus[$g]->restaurant_id)
                            <h1 style="margin-bottom: 0px">{{ $menu->restaurant_name }}</h1>
                        @break
                    @endif
                @endforeach

                <hr style="margin-top: 0px">

                @foreach ($menus as $menu)

                    @if ($menu->restaurant_id == $gmenus[$g]->restaurant_id)

                        <div class="product_data">
                            <div class="card mb-3" style="max-width: 540rem;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ $menu->menu_img }}" style="width: 100%;height: 100%;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $menu->menu_name }}</h4>
                                            <p class="card-text">

                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                        <h5 class="cart-grand-price">                                                          <span class="cart-grand-price-viewajax">
                                                                <b>ราคา {{ $menu->menu_price }} บาท</b>
                                                            </span>
                                                        </h5>
                                                    </div>
                                                </div>

                                                <small class="text-muted">

                                                    @foreach ($torders as $item)
                                                        @if ($menu->menu_id == $item->menu_id)
                                                            จำนวนคิวรอ <b id="orders_status"> {{ $item->torder }} </b> คิว
                                                        @endif
                                                    @endforeach
                                                    <br>


                                                </small>
                                            </p>
                                            <input type="hidden" name="user_id" id="user_id" class="user_id"
                                                value="{{ Auth::check() ? Auth::user()->id : null }}">
                                            <input type="hidden" name="menu_id" class="menu_id"
                                                value="{{ $menu->menu_id }}">
                                            <input type="hidden" name="menu_name" class="menu_name"
                                                value="{{ $menu->menu_name }}">
                                            <input type="hidden" class="qty-input" value="1">
                                            <button type="button" class="add-to-cart-btn btn btn-primary">สั่งอาหาร</button>
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


@endsection

@push('ajax_crud')

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}



@endpush
