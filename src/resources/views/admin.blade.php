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
        <p></p>
        <p></p>
        <p><a href="admin/user/new">新規作成</a></p>
        <table border="1">
            <tr>
              <th>名前</th>
              <th>年齢</th>
              <th>admin</th>
              <th></th>
            </tr>
            @foreach ($all_users as $item)
               <tr>
                 <td>{{$item->name}}</td>
                 <td>{{$item->email}}</td>
                 <td>{{$item->admin}}</td>
                 <td><a href="admin/user/delete/{{$item->id}}">削除</a></td>
                 <td><a href="admin/user/edit/{{$item->id}}">編集</a></td>
            @endforeach
         </table>
         <p></p>
         <p><a href="admin/contetn/new">新規作成</a></p>
         
         <table border="1">
            <tr>
              <th>学習コンテンツ</th>
              <th></th>
              <th></th>
            </tr>
            @foreach ($all_contents as $item)
               <tr>
                 <td>{{$item->content}}</td>
                 <td><a href="admin/content/delete/{{$item->id}}">削除</a></td>
                 <td><a href="admin/content/edit/{{$item->id}}">編集</a></td>
            @endforeach
         </table>
         <p></p>
         <p><a href="admin/language/new">新規作成</a></p>
         
         <table border="1">
            <tr>
              <th>言語</th>
              <th></th>
              <th></th>
            </tr>
            @foreach ($all_languages as $item)
               <tr>
                 <td>{{$item->language}}</td>
                 <td><a href="admin/language/delete/{{$item->id}}">削除</a></td>
                 <td><a href="admin/language/edit/{{$item->id}}">編集</a></td>
            @endforeach
         </table>
                 
    </div>
    <script type="application/javascript">
    </script>
    <script src="{{ asset('js/webapp.js') }}"></script>
@endsection
