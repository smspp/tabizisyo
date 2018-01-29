<?php
//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------
//地域　受信チェック:name
if(!isset($_POST["name"]) || $_POST["name"]==""){
  exit("ParameError!Name!");
}


//ファイル受信チェック※$_FILES["img"]の場合
if(!isset($_FILES["img"]["name"]) || $_FILES["img"]["name"]==""){
  exit("ParameError!Files!");
}

//タイトル 受信チェック:title
if(!isset($_POST["title"]) || $_POST["title"]==""){
  exit("ParameError!Title!");
}

//説明 受信チェック:naiyou
if(!isset($_POST["naiyou"]) || $_POST["naiyou"]==""){
  exit("ParameError!Naiyou!");
}


//----------------------------------------------------
//２. POSTデータ取得
//----------------------------------------------------
$name  = $_POST["name"];   //地域
$img  = $_FILES["img"]["name"];   //File名
$title = $_POST["title"];   //タイトル
$naiyou  = $_POST["naiyou"];   //説明

//1-2. FileUpload処理
$upload = "./image/"; //画像アップロードフォルダへのパス
//アップロードした画像を../img/へ移動させる記述↓
if(move_uploaded_file($_FILES['img']["tmp_name"], $upload.$img)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['img']['error'];
}

//----------------------------------------------------
//３. DB接続します(エラー処理追加)
// 本番では：データベース名、レンタルサーバーアドレス、レンタルサーバーからもらうid、passを記入
//----------------------------------------------------
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//----------------------------------------------------
//４．データ登録SQL作成
//----------------------------------------------------
// prepareの中に実際のsql文を書く
$stmt = $pdo->prepare("INSERT INTO kadai_tabi(id, name, img, title, naiyou, date)
VALUES(NULL, :name, :img, :title, :naiyou, sysdate() )");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute();

//----------------------------------------------------
//５．データ登録処理後
//----------------------------------------------------
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．top.phpへリダイレクト
  header("Location: top.php");
  exit;
}
?>
