@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="all_container">
        投稿が完了しました
        <a href="/home">トップページへ</a>
    </div>
@endsection