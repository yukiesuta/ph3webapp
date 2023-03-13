@extends('layouts.app')

@section('content')
    <div class="all_container">
            <div><img src="{{$data->thumbnail_url}}" alt="" style="width: 50%"></div>
            <h1>{{ $data->title }}</h1>
            <div>{{ $data->text }}</div>
    </div>
@endsection
