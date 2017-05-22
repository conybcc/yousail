@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <a href="{{ route('article.save.show') }}" >发表文章</a>
                @include('article.list')
            </div>
        </div>
    </div>
</div>
@endsection
