@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <H1 style="text-align: center"><b>My Orders</b></H1>
                    <hr>
                    <br>
                    <div class="container">
                        <div class="col-md-8 section offset-md-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">


                                    <h1>ร้าน {{ $res[0]->restaurant_name }}</h1>
                                    <hr>
                                    <b style="color: rgb(33, 184, 19)"><h1>ราคา {{ request()->query('price') }} บาท</h1></b>
                                    <h1>เลขบัญชี {{ $res[0]->restaurant_bank }}</h1>
                                </div>
                                <div class="panel-body">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('file.upload.post') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input type="file" name="file" class="form-control">
                                                <input type="hidden" name="id" id="id" value="{{ request()->query('id') }}">
                                            </div>

                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-success">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection
