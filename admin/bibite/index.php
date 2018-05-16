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

require_once  $homedir.'/pizzeria2/models/db.php';
$db = new DB();

$bibite = $db->getRows('Bibite',array('order_by'=>'prezzo'));

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

  <?php 
  $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
  include $homedir.'/pizzeria2/header.php';
  
  ?>
  <body>
  	
<div class="container" id="page-content">
    <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <div class="row">
        <a href="addEdit.php" class="btn btn-default">
            Aggiungi <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Dimensione</th>
                    <th>Prezzo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userData">
                <?php if(!empty($bibite)): $count = 0; foreach($bibite as $bibita): $count++; ?>
                <tr>
                    <td><?php echo $bibita['nome_bibite']; ?></td>
                    <td><?php echo $bibita['dimensione']; ?></td>
                    <td><?php echo $bibita['prezzo']; ?></td>
                    <td>
                        <a href="addEdit.php?id=<?php echo $bibita['id']; ?>" class="btn btn-template-outlined"><i class="fa fa-pencil"></i></a>
                        <a href="action.php?action_type=delete&id=<?php echo $bibita['id']; ?>" onclick="return confirm('Sei sicuro di eliminare?')" class="btn btn-template-outlined" ><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5">Nessun risultato</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include $homedir.'/pizzeria2/footer.php';?>

  </body>
</html>

