<!DOCTYPE html>
<html lang="en">

<?php include 'head.php';?>

<body>
  <div id="all">
    <!-- start header -->
    <?php include 'header.php';?>
    <!-- end header -->
    <section class="bar background-white relative-positioned">
      <div class="container">
        <!-- Carousel Start-->
        <div class="home-carousel">
          <div class="dark-mask mask-primary"></div>
          <div class="container">
            <div class="homepage owl-carousel">
              <div class="item">
                <div class="row">
                  <div class="col-md-5 text-right">
                    <p><img src="img/logo.png" alt="" class="ml-auto"></p>
                    <h1>Multipurpose responsive theme</h1>
                    <p>Business. Corporate. Agency.<br>Portfolio. Blog. E-commerce.</p>
                  </div>
                  <div class="col-md-7"><img src="img/bg-pizza-1.jpg" alt="" class="img-fluid"></div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-md-7 text-center"><img src="img/bg-pizza-2.jpg" alt="" class="img-fluid"></div>
                  <div class="col-md-5">
                    <h2>46 HTML pages full of features</h2>
                    <ul class="list-unstyled">
                      <li>Sliders and carousels</li>
                      <li>4 Header variations</li>
                      <li>Google maps, Forms, Megamenu, CSS3 Animations and much more</li>
                      <li>+ 11 extra pages showing template features</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-md-5 text-right">
                    <h1>Design</h1>
                    <ul class="list-unstyled">
                      <li>Clean and elegant design</li>
                      <li>Full width and boxed mode</li>
                      <li>Easily readable Roboto font and awesome icons</li>
                      <li>7 preprepared colour variations</li>
                    </ul>
                  </div>
                  <div class="col-md-7"><img src="img/bg-pizza-3.jpg" alt="" class="img-fluid"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Carousel End-->
      </div>
    </section>
    <section class="bar background-white">
        <div class="container text-center">
          <?php include 'buon-appetito.php';?>
        </div>
    </section>
    <section class="bar background-white">
      <div class="container">
      <div class="row">
        <div class="col-sm">
          <section  class="bar background-white color-white text-center bg-fixed relative-positioned">
            <div class="dark-mask mask-primary"></div>
            <div class="container">
              <div class="icon icon-outlined icon-lg"><i class="fa fa-shopping-bag"></i></div>
              <h3 class="text-uppercase">Ritira in Pizzeria</h3>
              <p class="lead">Puoi effetture il tuo ordine e venire a ritirarlo in pizzeria.</p>
              <p class="text-center"><a href="prodotti.php?ritiro=true" class="btn btn-template-outlined-white btn-lg">Vai ai prodotti</a></p>
            </div>
          </section>
        </div>
        <div class="col-sm">
          <section  class="bar background-white color-white text-center bg-fixed relative-positioned">
            <div class="dark-mask mask-primary"></div>
            <div class="container">
              <div class="icon icon-outlined icon-lg"><i class="fa fa-desktop"></i></div>
              <h3 class="text-uppercase">Consegna a domicilio</h3>
              <p class="lead">Effettua la prenotazione on line.</p>
              <p class="text-center"><a href="prodotti.php?ritiro=false" class="btn btn-template-outlined-white btn-lg">Vai ai prodotti</a></p>
            </div>
          </section>
        </div>
      </div>
    </section>
    
    </div>
    
    
   <?php include 'footer.php';?>
  </div>
  

</body>
</html>
