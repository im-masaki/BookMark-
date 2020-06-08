<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="b_signUp.php">Sign Up</a></div>
        <div class="pull-right"><a class="navbar-brand" href="b_logout.php">Sign Out</a></div>
        <div class="pull-right"><a class="navbar-brand" href="b_login.php">Sign In</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form class="form-horizontal" method="post" action="b_signUp_insert.php">

<h2 class="text-center">Book Mark!!</h2>

<div class="jumbotron">

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">User：</label>
        <div class="col-sm-6">
            <input type="text" name="user_name" class="form-control" id="inputEmail3" placeholder="User Name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">ID：</label>
        <div class="col-sm-6">
            <input type="text" name="user_id" class="form-control" id="inputEmail3" placeholder="User ID">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Password：</label>
        <div class="col-sm-6">
            <input type="password" name="user_pw" class="form-control" id="inputEmail3" placeholder="User Password">
        </div>
    </div>
     <input type="hidden" name="life_flg">
     
     <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-default">Sign up</button>
        </div>
    </div>

</div>

</form>
<!-- Main[End] -->


</body>
</html>
