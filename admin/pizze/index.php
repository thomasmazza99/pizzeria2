<!DOCTYPE html>
<html lang="en">
<?php 
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    include $homedir.'/pizzeria2/head.php';
    //start session
    session_start();

    //get session data
    $sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

    require_once  $homedir.'/pizzeria2/models/db.php';
    $db = new DB();

    $pizze = $db->getRows('Pizze',array('order_by'=>'prezzo'));

    //get status message from session
    if(!empty($sessData['status']['msg'])){
        $statusMsg = $sessData['status']['msg'];
        $statusMsgType = $sessData['status']['type'];
        unset($_SESSION['sessData']['status']);
    }
?>
<body>
  <div id="wrapper">
    <!-- start header -->
    <?php include $homedir.'/pizzeria2/header.php';?>
    <!-- end header -->
   
    <section id="content">
      <div class="container">
       <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
        <div class="alert alert-success"><?php echo $statusMsg; ?></div>
        <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
        <?php } ?>
        <div class="row">
            <a href="addEdit.php" class="btn btn-default">
                Aggiungi <span class="icon-plus" aria-hidden="true"></span>
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
                    <?php if(!empty($pizze)): $count = 0; foreach($pizze as $pizza): $count++; ?>
                    <tr>
                        <td><?php echo $pizza['nome_pizza']; ?></td>
                        <td><?php echo $pizza['ingredienti']; ?></td>
                        <td><?php echo $pizza['prezzo']; ?></td>
                        <td>
                            <a href="addEdit.php?id=<?php echo $pizza['id']; ?>"><i class="icon-edit"></i></a>
                            <a href="action.php?action_type=delete&id=<?php echo $pizza['id']; ?>" onclick="return confirm('Sei sicuro di eliminare?')"><i class="icon-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td colspan="5">Nessun risultato</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>