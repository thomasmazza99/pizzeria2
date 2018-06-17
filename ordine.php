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
              <p class="lead">Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being prepared</strong>.</p>
              <p class="lead text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
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
                <div class="row addresses">
                  <div class="col-md-6 text-right">
                    <h3 class="text-uppercase">Invoice address</h3>
                    <p>John Brown<br>					    13/25 New Avenue<br>					    New Heaven<br>					    45Y 73J<br>					    England<br>					    Great Britain</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <h3 class="text-uppercase">Shipping address</h3>
                    <p>John Brown<br>					    13/25 New Avenue<br>					    New Heaven<br>					    45Y 73J<br>					    England<br>					    Great Britain</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Customer section</h3>
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