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
$stmt = $pdo->prepare("SELECT * FROM kadai_tabi_top INNER JOIN kadai_tabi
   on kadai_tabi_top.name = kadai_tabi.name WHERE kadai_tabi_top.id=:id");
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
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view1 .= '<li class="co-item">';
    $view1 .= '<a href="third.php?id='.$result["id"].'">';
    $view1 .= '<img src="./image/'.$result["img"].'" class="co-img">';
    $view1 .= '</a>';
    $view1 .= '<h3 class="co-title">'.$result["title"].'</h3>';
    $view1 .= '</li>';
    $view2 = $result["name"];
  }
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
  <link rel="stylesheet" href="css/second.css">
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
    <h2 class="h2"><?= $view2 ?></h2>
    <div class="line"></div>
  </div>

  <ul class="co-list">
    <?php echo $view1; ?>
  </ul>

</div>
</body>
