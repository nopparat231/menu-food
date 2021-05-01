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

                @foreach ($menu as $key => $value)

                <div class="card mb-3" style="max-width: 540rem;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$value->menu_img}}"
                                style="width: 100%;height: 100%;" alt="กระเพราหมูสับ">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$value->menu_name}}</h5>
                                <p class="card-text"><small class="text-muted">จำนวนคิวรอ {{1}} คิว</small></p>
                                <a href="#" class="btn btn-primary">สั่งอาหาร</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                {!! $menu->links() !!}    
            </div>
        </div>
    </div>


@endsection
