<?php
session_start();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/hensyugamen.css">
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
        <li class="navi-item"><a href="shinkitouroku.php" class="newlog">求む編集者</a></li>
      </ul>
    </div>
  </header>

  <div class="script">
    <p>沢山編集して、みんなで項目を増やしていきましょう。</p>
  </div>
  <div class="sen"></div>

  <form action="insert2.php" method="post" enctype="multipart/form-data" class="form">
    <div class="hensyuform">
    <ul class="ul">
      <li class="li">地域</li>
      <li class="li">写真</li>
      <li class="li">タイトル</li>
      <li class="li">説明</li>
    </ul>
    <ul class="ul2">
      <li class="li2"><input type="text" name="name" class="hako" placeholder="都道府県名を入力"></li>
      <li class="li2"><input type="file" name="img" class="cms-item" accept="image/*"></li>
      <li class="li2"><input type="text" name="title" class="hako" placeholder="店名・詳しい場所名など特定しやすいもの"></li>
      <li class="li2"><textarea name="naiyou" class="textarea"></textarea></li>
    </ul>
  </div>
    <div class="btn">
      <input type="submit" class="btn-update" value="登録">
    </div>
  </form>





</div>
</body>
