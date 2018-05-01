<?php if(!empty($cart->items)): ?>
<li class="nav-item dropdown"><a href="carrello.php" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-secondary"><?php echo count($cart->items); ?></span></a>
<?php endif; ?>