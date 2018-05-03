<!DOCTYPE html>
<html lang="en">
<?php 
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    include $homedir.'/pizzeria2/head.php';
    require_once  $homedir.'/pizzeria2/models/UserModel.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $userModel=new UserModel();
    if(isset($_REQUEST['submit'])){
      if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
        $result=$userModel->login($_REQUEST['username'],$_REQUEST['password']);
        if($result==true){
            $_SESSION['user']=$userModel;
            if(isset($_REQUEST['redirurl'])) {
                $url = $_REQUEST['redirurl']; 
            }
            else{ 
                $url = "/pizzeria2";
            }
            header("Location:$url");
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
        <div class="alert alert-danger" role="alert">
            Username e/o password errate!
        </div>
        <form action="login.php" method="post">
            <div class="form-group">
                <input id="username" name="username" type="text" placeholder="email" class="form-control">
            </div>
            <div class="form-group">
                <input id="password" name="password" type="password" placeholder="password" class="form-control">
            </div>
            <p class="text-center">
                <button name="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
            </p>
        </form>
      </div>
    </div>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>