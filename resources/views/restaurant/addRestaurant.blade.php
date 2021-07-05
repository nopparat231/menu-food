@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">

                        <h5 class="card-title">เพิ่มร้าน</h5>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ชื่อร้าน</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Add</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
