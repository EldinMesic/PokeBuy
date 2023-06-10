<?php 
session_start();
if (isset($_SESSION['products'])) {

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Web Shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<script src="script.js"></script>
  </head>
  <body>


    <div class="my-navbar">
      <img src="images/PokeBuyLogo.png" />
      <img src="images/title.png" id="titleImg"/>
    </div>


    <div class="main-container">
      <div class="cart-container">
        <button class="cart-button blue-hover-btn">Cart 
			<span class="cart-badge">
				<?php
					if(isset($_SESSION['cart'])){
						echo count($_SESSION['cart']);
					}else{
						echo 0;
					}
				?>
			</span>
		</button>
      </div>


      <div class="items-grid">
		<?php foreach($_SESSION['products'] as $pokemon){ ?>
				<script>
					createPokemon( <?php echo json_encode($pokemon); ?> );
				</script>		
		<?php } ?>
      </div>


      <div class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Cart</h2>
          <ul class="cart-items"></ul>
          <p>Total: <span class="cart-total">$0.00</span></p>
          <button class="buy-btn blue-hover-btn">Buy</button>
        </div>
      </div>


    </div>
    
    
    
  </body>
</html>


<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>