<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Vali Admin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="lockscreen-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="lock-box"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" class="img-circle user-image">
        <h4 class="text-center user-name">John Doe</h4>
        <p class="text-center text-muted">Account Locked</p>
        <form action="index.php" class="unlock-form">
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input type="password" placeholder="Password" autofocus class="form-control">
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block">UNLOCK <i class="fa fa-unlock fa-lg"></i></button>
          </div>
        </form>
        <p><a href="page-login.php">Not John ? Login Here.</a></p>
      </div>
    </section>
  </body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/essential-plugins.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script src="js/main.js"></script>
</html>