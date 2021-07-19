@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">

                        <h3 class="card-title">{{ $res[0]->restaurant_name }}</h3>
                        <form action="{{ url('menu') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <br>
                                <label for="exampleInputPassword1">ชื่อเมนู</label>
                                <input type="text" name="menu_name" class="form-control">
                                <br>
                                <label for="exampleInputPassword1">ราคา</label>
                                <input type="number" name="menu_price" class="form-control">

                                <br>
                                <label for="exampleInputPassword1">รูปอาหาร URL</label>
                                <input type="text" name="menu_img" class="form-control">

                                <input type="hidden" name="menu_status" value="0">
                                <input type="hidden" name="menu_detail" value="test">
                                <input type="hidden" name="restaurant_id" value="{{ $res[0]->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
