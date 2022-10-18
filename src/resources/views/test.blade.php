<!DOCTYPE html>
<html lang="ja">
  <style>
    #button {
      width: 200px;
      text-align: center;
    }
    #button a {
      padding: 10px 20px;
      display: block;
      border: 1px solid #2a88bd;
      background-color: #ffffff;
      color: #2a88bd;
      text-decoration: none;
      box-shadow: 2px 2px 3px #f5deb3;
    }
    #button a:hover {
      background-color: #2a88bd;
      color: #ffffff;
    }
  </style>
  <body>
    <h1>パスワード再発行</h1>
    <p>あなたの新しいパスワードは password です</p>
    <p>下記リンクからログインしてください</p>
    <p id="button">
      <a href="http://localhost/login">ログインページへ</a>
    </p>
  </body>
</html>