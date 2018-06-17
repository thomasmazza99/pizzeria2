<!DOCTYPE html>
<html lang="en">

<?php 
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    include $homedir.'/pizzeria2/head.php';
    require_once  $homedir.'/pizzeria2/models/CarrelloModel.php';
    require_once  $homedir.'/pizzeria2/models/UserModel.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $cart = !empty($_SESSION['cart'])?$_SESSION['cart']:null;
    $user = !empty($_SESSION['user'])?$_SESSION['user']:null;
    if(isset($_REQUEST['save']) && $cart && $user){
      $cart->createOrder($user);
      header("Location: ordine.php?success");
    }
    if(isset($_REQUEST['success'])){

    }
?>
<body>
  <div id="wrapper">
    <!-- start header -->
    <?php include $homedir.'/pizzeria2/header.php';?>
    <!-- end header -->
   
    <div id="content">
      <div class="container">

          <div class="row bar">
            <div id="customer-order" class="col-lg-12">
              <p class="lead">Di seguito il riepilogo dell'ordine.</p>
              <p class="lead text-muted">Procedendo il tuo ordine verrà salvato!</p>
              <?php if(isset($_REQUEST['success'])): ?>
              <p class="lead ">Ordine Inserito con successo!</p>
              <?php endif; ?>
              <div class="box">
              <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Prodotto</th>
                          <th>Quantità</th>
                          <th>Prezzo Unitario</th>
                          <th>Dimensione</th>
                          <th colspan="2">Totale</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($cart->items as $item):  ?>
                        <tr>
                          <form method="post" action="carrello.php?id_product=<?php echo $item->product_id;?>&tipo=<?php echo $item->tipo;?>">
                          <td><a href="#"><img src="<?php echo $item->img;?>" alt="<?php echo $item->titolo;?>" class="img-fluid"></a></td>
                            <td><a href="#"><?php echo $item->titolo;?></a></td>
                            <td>                          
                              <?php echo $item->quantity;?>
                            </td>
                            <td><i class="fa fa-eur" aria-hidden="true"></i> <?php echo $item->prezzo;?></td>
                            <td>                          
                              <?php echo $item->grandezza;?>
                              <input type="hidden" name="grandezza" value="<?php echo $item->grandezza;?>"/>
                            </td>
                            <td><i class="fa fa-eur" aria-hidden="true"></i> <?php echo $item->getTotale();?></td>                       
                          </form>                          
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="5">Totale</th>
                          <th colspan="2"><i class="fa fa-eur" aria-hidden="true"></i><?php echo $cart->getTotale();?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="box-footer d-flex justify-content-between align-items-center">
                    <div class="left-col"><a href="prodotti.php" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Vai ai prodotti</a></div>
                    <div class="right-col">
                      <button type="submit" class="btn btn-template-outlined"><a href="ordine.php?save">Salva ordine </a><i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>