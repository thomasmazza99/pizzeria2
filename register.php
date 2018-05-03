<!DOCTYPE html>
<html lang="en">
<?php 
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    include $homedir.'/pizzeria2/head.php';
    require_once  $homedir.'/pizzeria2/models/CarrelloModel.php';
    require_once  $homedir.'/pizzeria2/models/UserModel.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $userModel=new UserModel();
    if(isset($_REQUEST['submit'])){
      if(isset($_REQUEST['name-login']) && isset($_REQUEST['email-login']) && isset($_REQUEST['password-login']) && isset($_REQUEST['password-login-confirm'])){
        $registerResult=$userModel->register($_REQUEST['name-login'],$_REQUEST['password-login'],$_REQUEST['password-login-confirm'],$_REQUEST['email-login']);
        if($registerResult==true){
          $_SESSION['user']=$userModel;
        }
      }
    }
?>
<body>
  <div id="wrapper">
    <!-- start header -->
    <?php include $homedir.'/pizzeria2/header.php';?>
    <!-- end header -->
   
    <div id="content">
      <div class="container">
        <div class="row">
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">Nuovo Account</h2>
                <p class="lead">Non sei ancora registrato?</p>
                <p class="text-muted">Registrandoti potrai ordinare effettuare i tuoi ordini.</p>
                <hr>
                <form action="register.php" method="post">
                  <div class="form-group">
                    <label for="name-login">Username</label>
                    <input id="name-login" name="name-login" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email-login">Email</label>
                    <input id="email-login" name="email-login" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password-login">Password</label>
                    <input id="password-login" name="password-login" type="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password-login-confirm">Password</label>
                    <input id="password-login-confirm" name="password-login-confirm" type="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> Register</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">Login</h2>
                <p class="lead">Sei gia registrato?</p>
                <p class="text-muted">Effettua il login.</p>
                <hr>
                <form action="login.php" method="get">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>
