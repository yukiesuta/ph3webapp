@extends('layouts.app')

@section('content')
    <div class="container">
        「 {{ $language->language }}」
        を本当に削除しますか？
        <form action="/{{ request()->path() }}" method="POST">
            @csrf
            <input type="submit" value="はい">
        </form>
    </div>
@endsection