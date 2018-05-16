
<!DOCTYPE html>
<html lang="en">
<?php 
  $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
  include $homedir.'/pizzeria2/head.php';
  require_once  $homedir.'/pizzeria2/models/ProdottiModel.php';
  $limit=isset($_REQUEST['limit'])?$_REQUEST['limit']:20;
  $start=isset($_REQUEST['start'])?$_REQUEST['start']:0;
  $ritiro=isset($_REQUEST['ritiro'])?$_REQUEST['ritiro']:true;
  $tipo=isset($_REQUEST['tipo'])?$_REQUEST['tipo']:'pizze';
  $prodottiModel = new ProdottiModel();
  $prodotti=$prodottiModel->getProdotti($start,$limit,array('tipo'=>$tipo));
?>
<body>
  <div id="wrapper">
    <!-- start header -->
    <?php include $homedir.'/pizzeria2/header.php';?>
    <!-- end header -->
   
    <div id="content">
      <div class="container">
         <div class="row bar">
            <div class="col-md-3">
              <!-- MENUS AND FILTERS-->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Prodotti</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm category-menu">
                    <li class="nav-item"><a href="prodotti.php?ritiro=<?php echo $ritiro ?>&tipo=pizze" class="nav-link d-flex <?php echo $tipo==='pizze'?'active':''; ?> align-items-center justify-content-between"><span>Pizze </span><span class="badge badge-secondary"><?php echo $prodottiModel->countPizze(); ?></span></a>
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a href="prodotti.php" class="nav-link">Bianche</a></li>
                        <li class="nav-item"><a href="prodotti.php" class="nav-link">Rosse</a></li>
                        <li class="nav-item"><a href="prodotti.php" class="nav-link">Giganti</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a href="prodotti.php?ritiro=<?php echo $ritiro ?>&tipo=panini" class="nav-link d-flex <?php echo $tipo==='panini'?'active':''; ?> align-items-center justify-content-between"><span>Panini  </span><span class="badge badge-secondary"><?php echo $prodottiModel->countPanini(); ?></span></a>
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a href="prodotti.php" class="nav-link">Panini Speciali</a></li>
                     
                      </ul>
                    </li>
                    <li class="nav-item"><a href="prodotti.php?ritiro=<?php echo $ritiro ?>&tipo=insalate" class="nav-link d-flex <?php echo $tipo==='insalate'?'active':''; ?> align-items-center justify-content-between"><span>Insalate  </span><span class="badge badge-secondary"><?php echo $prodottiModel->countInsalate(); ?></span></a>
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a href="prodotti.php" class="nav-link">T-shirts</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a href="prodotti.php?ritiro=<?php echo $ritiro ?>&tipo=bibite" class="nav-link d-flex <?php echo $tipo==='bibite'?'active':''; ?> align-items-center justify-content-between"><span>Bibite  </span><span class="badge badge-secondary"><?php echo $prodottiModel->countBibite(); ?></span></a>
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a href="prodotti.php" class="nav-link">T-shirts</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div class="col-md-9">
              <div class="row products products-big">
                <?php if(!empty($prodotti)): $count = 0; foreach($prodotti as $item): $count++; ?>
                <div class="col-lg-6 col-md-6">
                  <div class="product">
                    <div class="image"><a href="dettaglio-prodotto.php?id=<?php echo $item->id; ?>&tipo=<?php echo $tipo; ?>&ritiro=<?php echo $ritiro ?>"><img src="<?php echo $item->img; ?>" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="dettaglio-prodotto.php?id=<?php echo $item->id; ?>&tipo=<?php echo $tipo; ?>&ritiro=<?php echo $ritiro ?>"><?php echo $item->titolo; ?></a></h3>
                      <p><?php echo $item->descrizione; ?></p>
                      <p class="price"><i class="fa fa-eur" aria-hidden="true"></i> <?php echo $item->prezzo; ?></p>
                    </div>
                  </div>
                </div>
                <?php endforeach; endif;?>
              </div>
              
              <div class="pages">
                <p class="loadMore text-center"><a href="prodotti.php?more=true" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Carica altri</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
      </div>
    </section>
   <?php include $homedir.'/pizzeria2/footer.php';?>
  </div>
  

</body>
</html>
