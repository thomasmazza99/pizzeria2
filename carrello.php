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
    $ritiro=true;
    if(isset($_REQUEST['ritiro'])){
      $ritiro=$_REQUEST['ritiro'];
    }
    $cart = !empty($_SESSION['cart'])?$_SESSION['cart']:new CarrelloModel($ritiro);
    $grandezza='';
    if(isset($_REQUEST['grandezza'])){
      $grandezza=$_REQUEST['grandezza'];
    }
    if(isset($_REQUEST['id_product']) && isset($_REQUEST['tipo'])){
        if(isset($_REQUEST['action'])&& $_REQUEST['action']=='delete'){
             $cart->delete($_REQUEST['id_product'],$_REQUEST['tipo'],$grandezza );
        }elseif(isset($_REQUEST['action'])&& $_REQUEST['action']=='aggiorna'){
          $cart->aggiorna($_REQUEST['id_product'], $_REQUEST['quantity'], $_REQUEST['tipo'],$grandezza );
        }else{
            $cart->add($_REQUEST['id_product'], 1, $_REQUEST['tipo'],$grandezza );
        }
        
        $_SESSION['cart'] = $cart;
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
           <?php if(!empty($cart->items)): ?>
            <div class="col-lg-12">
              <p class="text-muted lead">Attualmente hai (<?php echo count($cart->items)?>) prodotti nel carrello</p>
            </div>
            
            <div id="basket" class="col-lg-9">
              <div class="box mt-0 pb-0 no-horizontal-padding">
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
                              <input type="number" name="quantity" value="<?php echo $item->quantity;?>" class="form-control">
                            </td>
                            <td><i class="fa fa-eur" aria-hidden="true"></i> <?php echo $item->prezzo;?></td>
                            <td>                          
                              <?php echo $item->grandezza;?>
                              <input type="hidden" name="grandezza" value="<?php echo $item->grandezza;?>"/>
                            </td>
                            <td><i class="fa fa-eur" aria-hidden="true"></i> <?php echo $item->getTotale();?></td>
                            <td>
                              <button type="submit" value="aggiorna" name="action" class="btn btn-template-outlined"><i class="fa fa-refresh"></i></button>
                              <button type="submit" value="delete" name="action" class="btn btn-template-outlined"><i class="fa fa-trash"></i></button>                              
                             </td>                        
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
                      <button type="submit" class="btn btn-template-outlined">Procedi con l'ordine <i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div id="order-summary" class="box mt-0 mb-4 p-0">
                <div class="box-header mt-0">
                  <h3>Reipilogo Ordine</h3>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Totale Ordine</td>
                        <th><i class="fa fa-eur" aria-hidden="true"></i><?php echo $cart->getTotale();?></th>
                      </tr>
                      <tr>
                        <td>Tipo Consegna</td>
                        <th>
                        <?php if($cart && $cart->ritiro==true):?>
                        <span> Ritiro Pizzeria</span>
                        <?php else: ?>
                        <span> Consegna a Domicilio</span>
                        <?php endif?>
                        </th>
                      </tr>
                      <tr>
                        <td>Costo Consegna</td>
                        <th><i class="fa fa-eur" aria-hidden="true"></i>0.00</th>
                      </tr>
                      <tr class="total">
                        <td>Totale</td>
                        <th><i class="fa fa-eur" aria-hidden="true"></i><?php echo $cart->getTotale();?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php else: ?>
            <div class="col-lg-12">
              <p class="text-muted lead">Non hai nessun prodotto nel carrello</p>
            </div>
          <?php endif; ?>
      </div>
    </div>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>