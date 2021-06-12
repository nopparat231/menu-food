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

                @php
                $i=1;
                @endphp

                @foreach ($menus as $menu)

                    @php
                        $name_res = $menu->restaurant_name;
                        
                    @endphp

                    @if ($name_res === $menu->restaurant_name)
                        <h2>{{ $menu->restaurant_name }}</h2>
                        <hr>
                    @endif
                    @php
                       $name_res = $name_res.$i;
$i++
                    @endphp
                    {{$name_res}}
                    <div class="card mb-3" style="max-width: 540rem;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $menu->menu_img }}" style="width: 100%;height: 100%;" alt="กระเพราหมูสับ">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $menu->menu_name }}</h5>
                                    <p class="card-text"><small class="text-muted">จำนวนคิวรอ <b id="orders_status"
                                                data-id="1">1</b> คิว</small></p>
                                    <input type="hidden" name="id" id="menu_id" value="{{ $menu->id }}">
                                    <button id="saveBtn" class="btn btn-primary">สั่งอาหาร</button>
                                </div>
                            </div>
                        </div>
                    </div>



                @endforeach


            </div>
        </div>
    </div>


@endsection

@push('ajax_crud')

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}

    {{-- <script src="{{ asset('js/ajax.js') }}"></script> --}}

@endpush
