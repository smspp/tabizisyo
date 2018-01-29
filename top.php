<?php
session_start();

$_SESSION['name'] = '一覧';

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai_tabi_top WHERE id<12");
$status = $stmt->execute();

//３．データ表示
$view1="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view1 .= '<li class="co-item">';
    $view1 .= '<a href="second.php?id='.$result["id"].'">';
    $view1 .= '<img src="./img/'.$result["img"].'" class="co-img">';
    $view1 .= '</a>';
    $view1 .= '<h3 class="co-title">'.$result["name"].'</h3>';
    $view1 .= '</li>';
  }
}




// 4.「あ」データ切断
$status = null;
$stmt = null;


//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai_tabi_top WHERE id BETWEEN 13 AND 19 ");
$status = $stmt->execute();

//３．データ表示
$view2="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view2 .= '<li class="co-item">';
    $view2 .= '<a href="second.php?id='.$result["id"].'">';
    $view2 .= '<img src="./img/'.$result["img"].'" class="co-img">';
    $view2 .= '</a>';
    $view2 .= '<h3 class="co-title">'.$result["name"].'</h3>';
    $view2 .= '</li>';
  }
}

// 4.「か」データ切断
$status = null;
$stmt = null;


//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai_tabi_top WHERE id>19 ");
$status = $stmt->execute();

//３．データ表示
$view3="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view3 .= '<li class="co-item">';
    $view3 .= '<a href="second.php?id='.$result["id"].'" class="co-imglink">';
    $view3 .= '<img src="./img/'.$result["img"].'" class="co-img">';
    $view3 .= '</a>';
    $view3 .= '<h3 class="co-title">'.$result["name"].'</h3>';
    $view3 .= '</li>';
  }
}

// 4.「さ」データ切断
$status = null;
$stmt = null;
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/top.css">
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
    <h2 class="h2">あ</h2>
    <div class="line"></div>
  </div>

  <ul class="co-list">
    <?php echo $view1; ?>
  </ul>

  <div class="title">
    <h2 class="h2">か</h2>
    <div class="line"></div>
  </div>

  <ul class="co-list">
    <?php echo $view2; ?>
  </ul>

  <div class="title">
    <h2 class="h2">さ</h2>
    <div class="line"></div>
  </div>

  <ul class="co-list">
    <?php echo $view3; ?>
  </ul>

</div>

<!-- jquery script -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="js/common.js"></script>
<script type="text/javascript">
jQuery(function($) {
  var nav = $('.head2'),
  offset = nav.offset();
  $(window).scroll(function () {
    if($(window).scrollTop() > offset.top) {
      nav.addClass('fixed');
    } else {
      nav.removeClass('fixed');
    }
  });
});
</script>

</body>
</html>
