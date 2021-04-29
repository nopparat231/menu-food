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


                <div class="card mb-3" style="max-width: 540rem;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cdn.pixabay.com/photo/2016/07/20/00/49/thailand-food-1529442_960_720.jpg"
                                style="width: 100%;height: 100%;" alt="กระเพราหมูสับ">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">กระเพราหมูสับ ไข่ดาว</h5>
                                <p class="card-text"><small class="text-muted">จำนวนคิวรอ 1 คิว</small></p>
                                <a href="#" class="btn btn-primary">สั่งอาหาร</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mb-3" style="max-width: 540rem;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cdn.pixabay.com/photo/2014/11/05/16/00/thai-food-518035_960_720.jpg"
                                style="width: 100%;height: 100%;" alt="ก๋วยเตี๋ยวผัด">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">ก๋วยเตี๋ยวผัด</h5>
                                <p class="card-text"><small class="text-muted">จำนวนคิวรอ 0 คิว</small></p>
                                <a href="#" class="btn btn-primary">สั่งอาหาร</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: 540rem;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cdn.pixabay.com/photo/2014/10/04/21/03/scrambled-eggs-474086_960_720.jpg"
                                style="width: 100%;height: 100%;" alt="ไข่เจียว">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">ไข่เจียว</h5>
                                <p class="card-text"><small class="text-muted">จำนวนคิวรอ 5 คิว</small></p>
                                <a href="#" class="btn btn-primary">สั่งอาหาร</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
