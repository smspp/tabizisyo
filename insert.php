<?php
//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------
//ユーザーID　受信チェック:userid
if(!isset($_POST["userid"]) || $_POST["userid"]==""){
  exit("ParameError!Userid!");
}

//メールアドレス 受信チェック:email
if(!isset($_POST["email"]) || $_POST["email"]==""){
  exit("ParameError!Email!");
}

//氏名 受信チェック:name
if(!isset($_POST["name"]) || $_POST["name"]==""){
  exit("ParameError!Name!");
}

//氏名(カナ) 受信チェック:namekana
if(!isset($_POST["namekana"]) || $_POST["namekana"]==""){
  exit("ParameError!Namekana!");
}

//性別 受信チェック:seibetu
if(!isset($_POST["seibetu"]) || $_POST["seibetu"]==""){
  exit("ParameError!Seibetu!");
}


//----------------------------------------------------
//２. POSTデータ取得
//----------------------------------------------------
$userid  = $_POST["userid"];   //ユーザーID
$email  = $_POST["email"];   //メールアドレス
$name = $_POST["name"];   //氏名
$namekana  = $_POST["namekana"];   //氏名(カナ)
$seibetu = $_POST["seibetu"];   //性別



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
$stmt = $pdo->prepare("INSERT INTO kadai_tabi_touroku(id, userid, email, name, namekana, seibetu, indate)
VALUES(NULL, :userid, :email, :name, :namekana, :seibetu, sysdate() )");
$stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR); //数値は_INT
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':namekana', $namekana, PDO::PARAM_STR);
$stmt->bindValue(':seibetu', $seibetu, PDO::PARAM_STR);
$status = $stmt->execute();

//----------------------------------------------------
//５．データ登録処理後
//----------------------------------------------------
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．shinkitouroku.phpへリダイレクト
  header("Location: hensyugamen.php");
  exit;
}
?>
