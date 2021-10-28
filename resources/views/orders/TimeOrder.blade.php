@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">

                            <h4 class="card-title">เวลาโดยประมาณ</h4>
                            <form action="timeorder_update" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="exampleInputPassword1">เวลาทำอาหาร</label>
                                    <input type="number" name="orders_time" class="form-control"
                                        id="exampleInputPassword1">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <input type="hidden" name="id" id="id" value="{{ request()->query('id') }}">
                                <button type="submit" class="btn btn-primary">OK</button>
                                <a href="/MyOrders" class=" btn btn-lite"
                                    style="background-color: rgb(172, 0, 0);color: white">Cancel</a>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection      