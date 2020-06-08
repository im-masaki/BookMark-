<?php
//1.GETでid値を取得
$id = $_GET["id"];

session_start();
include("b_funcs.php");
loginCheck();

//1.  DB接続します
$pdo = db_connect();

//3.SELECT * FROM gs_an_table WHERE id=:id;
$sql = "SELECT * FROM gs_bm_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //１データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();

}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Book Mark!!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand" href="b_index.php">Book Mark</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="b_select.php">Favorite</a></div>
      <div class="pull-right"><a class="navbar-brand" href="b_logout.php">Sign Out</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<form class="form-horizontal" method="post" action="b_update.php">

<h2 class="text-center">Book Mark!!</h2>

<div class="jumbotron">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">書籍名：</label>
        <div class="col-sm-6">
            <input type="text" name="name" value="<?=$row["name"]?>" class="form-control" id="inputEmail3">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">URL：</label>
        <div class="col-sm-6">
        <textarea name="url" placeholder="" rows="3" class="form-control" id="InputTextarea"><?=$row["url"]?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Comment：</label>
        <div class="col-sm-6">
        <textarea name="comment" placeholder="" rows="3" class="form-control" id="InputTextarea"><?=$row["comment"]?></textarea>
        </div>
    </div>

    <input type="hidden" name="id" value="<?=$row["id"]?>">

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>

</div>
</form>
<!-- Main[End] -->


</body>
</html>
