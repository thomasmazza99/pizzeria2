<!DOCTYPE html>
<html lang="en">

<?php 
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    include $homedir.'/pizzeria2/head.php';
    
?>
<body>
  <div id="wrapper">
    <!-- start header -->
    <?php include $homedir.'/pizzeria2/header.php';?>
    <!-- end header -->
   
    <div id="content">
    <div class="row">
    <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Messaggio Inviato Con Successo</h2>
                </div>
              </div>
    <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i><a href="index.php">OK</a></button> 
    </div>
    </div>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>