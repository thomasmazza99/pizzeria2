<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"
    <title>Pizzeria Rosso Blu - Insalate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="/pizzeria/assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/pizzeria/assets/css/style.css">
  </head>

  <body>

<?php
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
$homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );

require_once  $homedir.'/pizzeria/db.php';
$db = new DB();

$insalate = $db->getRows('Insalate',array('order_by'=>'prezzo'));

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

  <?php 
  $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
  include $homedir.'/pizzeria/menu.php';
  
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
                    <th>Ingredienti</th>
                    <th>Prezzo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userData">
                <?php if(!empty($insalate)): $count = 0; foreach($insalate as $insalata): $count++; ?>
                <tr>
                    <td><?php echo $insalata['nome_insalate']; ?></td>
                    <td><?php echo $insalata['ingredienti']; ?></td>
                    <td><?php echo $insalata['prezzo']; ?></td>
                    <td>
                        <a href="addEdit.php?id=<?php echo $insalata['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="action.php?action_type=delete&id=<?php echo $insalata['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Sei sicuro di eliminare?')"></a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5">Nessun risultato</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include $homedir.'/pizzeria/footer.php';?>

    <script src="/pizzeria/assets/scripts/jquery.min.js"></script>
    <script src="/pizzeria/assets/scripts/popper.min.js"></script>
    <script src="/pizzeria/assets/scripts/bootstrap.min.js"></script>
    <script src="/pizzeria/assets/scripts/custom.js"></script>
  </body>
</html>

