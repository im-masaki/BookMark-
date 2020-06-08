<?php
session_start();
include("b_funcs.php");
loginCheck();

//1.  DB接続します
$pdo = db_connect();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    // $view .= '<p>'.$r["name"].$r["url"].$r["comment"].'</p>';
    $view .= "<div>";
    $view .= '<a href="b_view.php?id='.$r["id"].'">';
    $view .=  "書籍名：".$r["name"]." <br> "."URL：".$r["url"]." <br> "."コメント：".$r["comment"];
    $view .=  '</a>';
    $view .=  '　　　　　　　　　　　　　　';
    
    //delete
    $view .= '<a href="b_delete.php?id='.$r["id"].'">';
    $view .= '<br>[削除]';
    $view .=  '</a>';
    $view .= "</div>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Favotite Books</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
       <div class="navbar-header"><a class="navbar-brand" href="b_index.php">Book Mark</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<h2 class="text-center">Book Mark!!</h2>

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
