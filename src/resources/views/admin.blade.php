@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <header>
        <section class="header_container">
            <div><img src="{{ asset('image/posseLogo.png') }}" alt="logo" class="logo"></div>
            <div class="week">4th week</div>
            <div class="link c_pointer" id="open" onclick="showModal()">記録・投稿</div>
            <a href="home">データ画面へ</a>
        </section>
    </header>
    <div class="all_container">
        {{-- {{dd($all_users)}} --}}
        <p></p>
        <p></p>
        <p></p>
        <table border="1">
            <tr>
              <th>名前</th>
              <th>年齢</th>
              <th>admin</th>
            </tr>
            @foreach ($all_users as $item)
               <tr>
                 <td>{{$item->name}}</td>
                 <td>{{$item->email}}</td>
                 <td>{{$item->admin}}</td>
            @endforeach
         </table>
                 
    </div>
    <script type="application/javascript">
    </script>
    <script src="{{ asset('js/webapp.js') }}"></script>
@endsection
