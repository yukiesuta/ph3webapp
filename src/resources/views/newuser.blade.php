@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <header>
    </header>
    <div class="all_container">
        <h2>User追加</h2>
        <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p><input type="text" name="name"></p>
            <p><input type="password" name="password"></p>
            <p><input type="email" name="email"></p>
            <p><input type="int" name="admin"></p>
            <p><input type="submit" value="追加"></p>
        </form>
    </div>
    <script type="application/javascript">
    </script>
    <script src="{{ asset('js/webapp.js') }}"></script>
@endsection
