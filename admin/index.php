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
       
      </div>
    </section>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>