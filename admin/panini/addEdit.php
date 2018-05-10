
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Rosso Blu - Panini</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="/pizzeria/assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/pizzeria/assets/css/style.css">
  </head>
  <?php 
  $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
  include $homedir.'/pizzeria/menu.php';?>
  <body>
  	
<?php
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

//get user data
if(!empty($_GET['id'])){
    
    require_once  $homedir.'/pizzeria/db.php';
    $db = new DB();
    $conditions['where'] = array(
        'id' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $row = $db->getRows('Panini', $conditions);
}

$actionLabel = !empty($_GET['id'])?'Modifica':'Aggiungi';

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<div class="container" id="page-content">
    <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo $actionLabel; ?> Panini <a href="index.php" class="glyphicon glyphicon-arrow-left"></a></div>
            <div class="panel-body">
                <form method="post" action="action.php" class="form">
                    <div class="form-group">
                        <label for="nome_panino">Nome</label>
                        <input type="text" class="form-control" name="nome_panino" id="nome_panino" value="<?php echo !empty($row['nome_panino'])?$row['nome_panino']:''; ?>">
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

	<?php include $homedir.'/pizzeria/footer.php';?>
    
</div>


    <script src="/pizzeria/assets/scripts/jquery.min.js"></script>
    <script src="/pizzeria/assets/scripts/popper.min.js"></script>
    <script src="/pizzeria/assets/scripts/bootstrap.min.js"></script>
    <script src="/pizzeria/assets/scripts/custom.js"></script>
  </body>
</html>
