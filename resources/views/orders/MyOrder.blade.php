@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card mb-2" style="max-width: 240rem;">
                        <div class="row g-0">
                            <div class="col-md-2">
                                <img src="https://cdn.pixabay.com/photo/2016/07/20/00/49/thailand-food-1529442_960_720.jpg" style="width: 100%;height: 100%;">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">กระเพราหมูสับ ไข่ดาว</h5>
                                    <p class="card-text"><small class="text-muted">จำนวนคิวรอ <b id="orders_status"
                                                data-id="1">1</b> คิว</small></p>
                                    <input type="hidden" name="menu_id" class="menu_id"
                                        value="1">
                                        <input type="hidden" name="menu_name" class="menu_name" value="กระเพราหมูสับ ไข่ดาว">
                                    <input type="hidden" class="qty-input" value="1">
                                    <button type="button" class="add-to-cart-btn btn btn-success">ยืนยันการรับอาหารสำเร็จ</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-2" style="max-width: 240rem;">
                        <div class="row g-0">
                            <div class="col-md-2">
                                <img src="https://cdn.pixabay.com/photo/2016/07/20/00/49/thailand-food-1529442_960_720.jpg" style="width: 100%;height: 100%;">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">กระเพราหมูสับ ไข่ดาว</h5>
                                    <p class="card-text"><small class="text-muted">จำนวนคิวรอ <b id="orders_status"
                                                data-id="1">1</b> คิว</small></p>
                                    <input type="hidden" name="menu_id" class="menu_id"
                                        value="1">
                                        <input type="hidden" name="menu_name" class="menu_name" value="กระเพราหมูสับ ไข่ดาว">
                                    <input type="hidden" class="qty-input" value="1">
                                    <button type="button" class="add-to-cart-btn btn btn-success">ยืนยันการรับอาหารสำเร็จ</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
