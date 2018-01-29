<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/shinkitouroku.css">
  <!-- <link rel="stylesheet" href="css/jquery.bxslider.css"> -->
</head>
<body>
<div class="wrap">

  <header class="header">
    <div class="head1">
      <div class="box">
      <h1>たびのじしょ。</h1>
      <p class="p1">読む、知る、旅する、追加する。みんなで創る、たびのじしょ。</p>
      </div>
    </div>
    <div class="head2">
      <ul class="navi-list">
        <li class="navi-item"><a href="top.php">たびのじしょ。TOP</a></li>
        <li class="navi-item">たびのじしょ。ルール</li>
        <li class="navi-item"><a href="hensyugamen.php" class="newlog">編集</li>
        <li class="navi-item"><a href="#" class="newlog">求む編集者</a></li>
      </ul>
    </div>
  </header>

  <div class="script">
    <p>各地の情報を投稿してくれる人を求めています。</p>
  </div>
  <div class="sen"></div>
  <div class="script2">
    <p>新規編集者登録</p>
  </div>

  <form action="insert.php" method="post" class="form" enctype="multipart/form-data">
    <div class="touroku">
      <ul class="ul">
        <li class="li">ユーザーID</li>
        <li class="li">メールアドレス</li>
        <li class="li">パスワード</li>
        <li class="li">氏名</li>
        <li class="li">氏名(カナ)</li>
        <li class="li">性別</li>
      </ul>
      <ul class="ul2">
        <li class="li2"><input type="text" name="userid" class="hako" placeholder="6文字以上・半角英数字"></li>
        <li class="li2"><input type="email" name="email" class="hako" placeholder="tabi@tabijisyo.jp"></li>
        <li class="li2"><input type="password" name="pass" class="hako" placeholder="8文字以上・半角英数字"></li>
        <li class="li2"><input type="text" name="name" class="hako" placeholder="旅田　旅子"></li>
        <li class="li2"><input type="text" name="namekana" class="hako" placeholder="タビタ　タビコ"></li>
        <li class="li2"><input type="radio" name="seibetu" class="radio" value="男">男
                        <input type="radio" name="seibetu" class="radio" value="女">女</li>
      </ul>
    </div>
      <div class="btn">
        <input type="submit" class="btn-update" value="登録">
      </div>
  </form>



</div>
</body>
