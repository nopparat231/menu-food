@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">

                        <h5 class="card-title">เพิ่มร้าน</h5>

                        <form action="" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="exampleInputPassword1">ชื่อร้าน</label>
                                <input type="text" name="restaurant_name" class="form-control" id="exampleInputPassword1">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <img
                            src="https://chart.googleapis.com/chart?cht=qr&chl='{{ url('restaurant/') }}'&chs=280x280&choe=UTF-8" />
                        <a class="btn btn-info" style="color: honeydew" target="_blank"
                            href="{{ url('https://chart.googleapis.com/chart?cht=qr&chl=' . url('restaurant/') . '&chs=280x280&choe=UTF-8') }}"
                            download>
                            <i class="bi bi-arrow-down-square-fill">โหลด QR Code ของร้าน</i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
