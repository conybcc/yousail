@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    <img src="{{ Auth::user()->avatar() }}" class="img-circle" style="width: 150px;height: 150px;" alt="">
                    <form id="avatar-form" method="POST"  enctype="multipart/form-data">
                        <input type="file" name="avatar">
                        {{ csrf_field() }}
                        <input type="submit"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
