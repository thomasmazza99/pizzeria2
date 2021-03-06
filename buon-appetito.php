<?php
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    require_once  $homedir.'/pizzeria2/models/ProdottiModel.php';
    $prodottiModel = new ProdottiModel();
    $prodotti=$prodottiModel->getProdotti(0,8);
?>

<div class="row">
    <!-- Image box with hover-->
    <div class="heading">
        <h2>Un piccolo assaggio.... Buon Appetito!!!</h2>
    </div>
    <div class="row mb-3">
        <?php if(!empty($prodotti)): $count = 0; foreach($prodotti as $item): $count++; ?>
        <div class="col-sm-3">
            <div class="box-image">
                <div class="image"><img src="<?php echo $item->img ?>" alt="" class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <div class="content">
                            <div class="name">
                                <h3><a href="dettaglio-prodotto.php?id=<?php echo $item->id; ?>&tipo=<?php echo $item->tipo; ?>" class="color-white"><?php echo $item->titolo; ?></a></h3>
                            </div>
                            <div class="text">
                                <p class="buttons"><a href="dettaglio-prodotto.php?id=<?php echo $item->id; ?>&tipo=<?php echo $item->tipo; ?>" class="btn btn-template-outlined-white">Dettagli</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif;?>
    </div>
</div>
