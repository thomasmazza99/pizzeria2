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
    <section class="bar pt-0">
            <div class="row">
             <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Contattaci</h2>
                </div>
              </div>
              <div class="col-md-8 mx-auto">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Nome</label>
                        <input id="name" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="subject">Oggetto</label>
                        <input id="subject" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="message">Messaggio</label>
                        <textarea id="message" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> <a href="mssinvio.php">Invia</a></button>
                    <button type="delete" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i><a href="index.php">Annulla</a></button>  
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
    </div>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>


