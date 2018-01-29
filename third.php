<?php
session_start();


//GETでidを取得
if(!isset($_GET["id"]) || $_GET["id"]==""){
  exit("ParamError!");
}else{
  $id = intval($_GET["id"]); //intval数値変換
  // echo $id;
}

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

// ２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai_tabi WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// //３．データ表示
$view1="";
if($status==false) {
  // execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch(); //１レコードだけ取得：$row["フィールド名"]で取得可能
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/third.css">
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

  <div class="title">
    <h2 class.h2><?=$row["title"]?></h2>
  <div class="line"></div>
  </div>

  <div class="syousai">
    <img src="./image/<?=$row["img"]?>" class="co-img">
    <div class="pp">
      <p class="setumei">説明</p>
      <p class="naiyou"><?=$row["naiyou"]?></p>
    </div>
  </div>




</body>
</div>
