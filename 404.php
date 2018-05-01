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
        <div class="container">
          <div id="error-page" class="col-md-8 mx-auto text-center">
            <div class="box">
              <p class="text-center"><a href="index.html"><img src="img/logo.png" alt="Obaju template"></a></p>
              <h3>Siamo spiacenti la pagina che state cercando non esiste!!</h3>
              <h4 class="text-muted">Error 404 - Pagina non trovata</h4>
              <p class="buttons"><a href="index.php" class="btn btn-template-outlined"><i class="fa fa-home"></i> Vai alla Homepage</a></p>
            </div>
          </div>
        </div>
      </div>
      <?php include $homedir.'/pizzeria2/footer.php';?>
    </div>


  </body>

</html>