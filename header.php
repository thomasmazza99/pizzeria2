 <?php 
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    require_once  $homedir.'/pizzeria2/models/CarrelloModel.php';
    require_once  $homedir.'/pizzeria2/models/UserModel.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart = !empty($_SESSION['cart'])?$_SESSION['cart']:null;
    $user = !empty($_SESSION['user'])?$_SESSION['user']:null;
    
?>
<!-- Top bar-->
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
              <p>Contattaci al 0516153392 o al 051430262</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
                <?php if($user==null): ?>
                  <div class="login">
                    <a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Login</span></a>
                    <a href="register.php" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Registrati</span></a>
                    <a href="/pizzeria2/admin/index.php" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Admin</span></a>
                  </div>
                <?php  else:?>
                <div>Salve <?php echo $user->username; ?> <a href="logout.php" class="signup-btn"><i class="fa fa-sign-out" aria-hidden="true"></i><span class="d-none d-md-inline-block">Logout</span></a> </div>
                <?php endif; ?>                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Top bar end-->
      <!-- Login Modal-->
      <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Login</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form action="login.php" method="post">
                <input type="hidden" name="redirurl" value="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
                <div class="form-group">
                  <input id="username" name="username" type="text" placeholder="email" class="form-control">
                </div>
                <div class="form-group">
                  <input id="password" name="password" type="password" placeholder="password" class="form-control">
                </div>
                <p class="text-center">
                  <button name="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                </p>
              </form>
              <p class="text-center text-muted">Non sei ancora registrato</p>
              <p class="text-center text-muted"><a href="register.php"><strong>Registrati</strong></a></p>
               
            </div>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      <!-- Navbar Start-->
      <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="index.php" class="navbar-brand home"><img src="/pizzeria2/img/logo.png" alt="Universal logo" class="d-none d-md-inline-block"><img src="/pizzeria2/img/logo-small.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Pizzeria Rosso Blu</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown"><a href="/pizzeria2" >Home </a>
                </li>
                <li class="nav-item dropdown menu-large"><a href="prodotti.php" data-toggle="dropdown" class="dropdown-toggle">Prodotti<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-lg-3"><img src="/pizzeria2/img/mega-menu-prodotti.jpg" alt="" class="img-fluid d-none d-lg-block"></div>
                        <div class="col-lg-3 col-md-3">
                          <h5>Pizze</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="prodotti.php?tipo=pizze&filter=rosse" class="nav-link">Rosse</a></li>
                            <li class="nav-item"><a href="prodotti.php?tipo=pizze&filter=bianche" class="nav-link">Bianche</a></li>
                          </ul>
                        </div>
                        <div class="col-lg-3 col-md-3">
                          <h5>Panini</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="prodotti.php?tipo=panini" class="nav-link">Panini di pizza</a></li>
                            <li class="nav-item"><a href="prodotti.php?tipo=panini" class="nav-link">Panini di pizza dolci</a></li>
                          </ul>
                        </div>
                        <div class="col-lg-3 col-md-3">
                          <h5>Insalate</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="prodotti.php?tipo=insalate" class="nav-link">Le nostre insalate</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <!-- ========== Contact dropdown ==================-->
                <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Contact <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="contact.html" class="nav-link">Contact option 1</a></li>
                    <li class="dropdown-item"><a href="contact2.html" class="nav-link">Contact option 2</a></li>
                    <li class="dropdown-item"><a href="contact3.html" class="nav-link">Contact option 3</a></li>
                  </ul>
                </li>
                <!-- ========== Contact dropdown end ==================-->
                <!-- ========== Carrello ==================-->
                <?php if($cart!=null && !empty($cart->items)): ?>
                  <li class="nav-item dropdown"><a href="carrello.php" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-secondary"><?php echo count($cart->items); ?></span></a>
                <?php endif; ?>
                <!-- ========== Carrello ==================-->
              </ul>
            </div>
            <div id="search" class="collapse clearfix">
              <form role="search" class="navbar-form">
                <div class="input-group">
                  <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </header>
      <!-- Navbar End-->