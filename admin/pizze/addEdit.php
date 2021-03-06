
<!DOCTYPE html>
<html lang="en">
<?php 
      $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
      include $homedir.'/pizzeria2/head.php'; 
      ?>
  <body>
  	
<?php
require_once  $homedir.'/pizzeria2/models/CarrelloModel.php';
require_once  $homedir.'/pizzeria2/models/UserModel.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

//get user data
if(!empty($_GET['id'])){
    
    require_once  $homedir.'/pizzeria2/models/db.php';
    $db = new DB();
    $conditions['where'] = array(
        'id' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $row = $db->getRows('Pizze', $conditions);
}

$actionLabel = !empty($_GET['id'])?'Modifica':'Aggiungi';

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<div id="wrapper">
    <!-- start header -->
    <?php include $homedir.'/pizzeria2/header.php';?>
    <!-- end header -->
   
    <div id="content">
    <div class="container">
    <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <div class="row bar">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo $actionLabel; ?> Pizza <a href="index.php" class="glyphicon glyphicon-arrow-left"></a></div>
            <div class="panel-body">
                <form method="post" action="action.php" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="immagine">Immagine</label><br>
                        <input type="file"  name="immagine"> <?php echo !empty($row['immagine'])?$row['immagine']:''; ?>
                    </div>
                    <div class="form-group">
                        <label for="nome_pizza">Nome</label>
                        <input type="text" class="form-control" name="nome_pizza" id="nome_pizza" value="<?php echo !empty($row['nome_pizza'])?$row['nome_pizza']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ingredienti">Ingredienti</label>
                        <input type="text" class="form-control" name="ingredienti" id="ingredienti" value="<?php echo !empty($row['ingredienti'])?$row['ingredienti']:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="prezzo">Prezzo</label>
                        <input type="text" class="form-control" name="prezzo" id="prezzo" value="<?php echo !empty($row['prezzo'])?$row['prezzo']:''; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo !empty($row['id'])?$row['id']:''; ?>">
                    <input type="submit" name="formSubmit" class="btn btn-success" value="<?php echo $actionLabel; ?>"/>
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
