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
   
    <section id="content">
      <div class="container">
      <div class="list-group">
          <a href="/pizzeria2/admin/pizze" class="list-group-item">Pizze</a>
          <a href="/pizzeria2/admin/panini" class="list-group-item">Panini</a>
          <a href="/pizzeria2/admin/insalate" class="list-group-item">Insalate</a>
          <a href="/pizzeria2/admin/bibite" class="list-group-item">Bibite</a>
        </div>
      </div>
    </section>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>

  </body>
</html>
