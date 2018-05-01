<!DOCTYPE html>
<html lang="en">
<?php 
  $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
  include $homedir.'/pizzeria2/head.php';
  require_once  $homedir.'/pizzeria2/models/ProdottiModel.php';
  if(!isset($_REQUEST['id']) || !isset($_REQUEST['tipo'])){
      header("Location:404.php");
  }
  $id=isset($_REQUEST['id'])?$_REQUEST['id']:0;
  $ritiro=isset($_REQUEST['ritiro'])?$_REQUEST['ritiro']:true;
  $tipo=isset($_REQUEST['tipo'])?$_REQUEST['tipo']:'pizze';
  $prodottiModel = new ProdottiModel();
  $prodotto=$prodottiModel->getProdotto($id,$tipo);
?>
<body>
  <div id="wrapper">
    <!-- start header -->
    <?php include $homedir.'/pizzeria2/header.php';?>
    <!-- end header -->
   
    <div id="content">
      <div class="container">
        <div class="row bar">
            <div class="col-lg-12">
            <div id="details" class="mb-4 mt-4">
                <p></p>
                <h4><?php echo $prodotto->titolo; ?></h4>
                <p><?php echo $prodotto->descrizione; ?></p>
              </div>
              <div id="productMain" class="row">
                <div class="col-sm-6">
                  <div>
                    <div> <img src="<?php echo $prodotto->img; ?>" alt="" class="img-fluid"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="box">
                    <form method="post" action="carrello.php?id_product=<?php echo $prodotto->id; ?>&tipo=<?php echo $prodotto->tipo; ?>">
                      <div class="sizes">
                        <h3>Grandezza</h3>
                        <select class="bs-select">
                          <option value="normale">Normale</option>
                          <option value="gigante">Doppio Impasto</option>
                        </select>
                      </div>
                      <p class="price"><i class="fa fa-eur" aria-hidden="true"></i> <?php echo $prodotto->prezzo; ?></p>
                      <p class="text-center">
                        <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Aggiungi al carrello</button>
                      </p>
                    </form>
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