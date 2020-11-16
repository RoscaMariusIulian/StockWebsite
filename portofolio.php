<!DOCTYPE html>
<html lang="ro-RO">
    <head>
        <title>Proiect PSBD</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/script.js"></script>
        <meta charset="utf-8"/>
	</head>
    <body onload='sellNumbers();'>
	<header>
		<h1>Stock Trading</h1>
		<?php include 'index.php';
		echo "<h1>{$result[0]['MONEY']}</h1>";
		?>
	</header>
    <nav>
		<ul>
			<li><a href='frontpage.php'>Home</a></li>
			<li><a href='stocks.php'>Stocks</a></li>
			<li><a href='portofolio.php'>Portfolio</a></li>
			<li><a onclick='sellNumbers();'>Next Day</a></li>
		</ul>
	</nav>
    <section>	
	<main>
	<?php
	if(isset($_SESSION['msj']))
		{
			$message = $_SESSION['msj'];
			$message = trim(preg_replace('/\s+/', ' ', $message));
			unset($_SESSION['msj']);
			echo "<script>alert('$message');</script>";
		}
	?>
	<div class="card">
	  <img src="images/tesla.jpg" alt="Avatar" class="card-img-top">
	  <div class="container">
		<div class="scris">
		<h4><b>Tesla Inc.</b></h4> 
		<strong><p id="priceTSLA">Sell price: </p></strong>
		<?php include 'own.php';
		echo "<strong>Owned: {$result[0]['QUANTITY']}</strong>";
		?>
		</div>
		<form action="sell.php" method="post" id="tesla">
			<input type="hidden" name="title" value="Tesla Inc.">
			<input type="hidden" name="price" id="pretTesla">
		</form>
		<input type="submit" name="buy" value='Sell' form="tesla" class="button" >
	  </div>
	</div>

	<div class="card">
	  <img src="images/facebook.jpg" alt="Avatar" class="card-img-top">
	  <div class="container">
		<div class="scris">
		<h4 name='title'><b>Facebook Inc.</b></h4> 
		<strong><p id="priceFB" name='price'>Sell price: </p></strong>
		<?php include 'own.php';
		echo "<strong>Owned: {$result[1]['QUANTITY']}</strong>";
		?>
		</div>
		<form action="sell.php" method="post" id="Facebook">
			<input type="hidden" name="title" value="Facebook Inc.">
			<input type="hidden" name="price" id="pretFacebook">
		</form>  
		<input type="submit" name="buy" value='Sell' form="Facebook" class="button">
	  </div>
	</div>

	<div class="card">
	  <img src="images/amazon.jpg" alt="Avatar" class="card-img-top">
	  <div class="container">
		<div class="scris">
		<h4 name='title'><b>Amazon.com Inc.</b></h4> 
		<strong><p id="priceAMZN" name='price'>Sell price: </p></strong>
		<?php include 'own.php';
		echo "<strong>Owned: {$result[2]['QUANTITY']}</strong>";
		?>
		</div>
		<form action="sell.php" method="post" id="Amazon">
			<input type="hidden" name="title" value="Amazon.com Inc.">
			<input type="hidden" name="price" id="pretAmazon">
		</form> 
		<input type="submit" name="buy" value='Sell' form="Amazon" class="button">
	  </div>
	</div>
	
	<div class="card">
	  <img src="images/blizzard.jpg" alt="Avatar" class="card-img-top">
	  <div class="container">
		<div class="scris">
		<h4><b>Blizzard Inc.</b></h4> 
		<strong><p id="priceATVI">Sell price: </p></strong>
		<?php include 'own.php';
		echo "<strong>Owned: {$result[3]['QUANTITY']}</strong>";
		?>
		</div>
		<form action="sell.php" method="post" id="blizzard">
			<input type="hidden" name="title" value="Blizzard Inc.">
			<input type="hidden" name="price" id="pretBlizzard">
		</form>
		<input type="submit" name="buy" value='Sell' form="blizzard" class="button" >
	  </div>
	</div>
	
	<div class="card">
	  <img src="images/marvel.jpg" alt="Avatar" class="card-img-top">
	  <div class="container">
		<div class="scris">
		<h4><b>Marvell Group Ltd.</b></h4> 
		<strong><p id="priceMRVL">Sell price: </p></strong>
		<?php include 'own.php';
		echo "<strong>Owned: {$result[4]['QUANTITY']}</strong>";
		?>
		</div>
		<form action="sell.php" method="post" id="marvell">
			<input type="hidden" name="title" value="Marvell Group Ltd." >
			<input type="hidden" name="price" id="pretMarvell">
		</form>
		<input type="submit" name="buy" value='Sell' form="marvell" class="button" >
	  </div>
	</div>
	
	<div class="card">
	  <img src="images/google.jpg" alt="Avatar" class="card-img-top">
	  <div class="container">
		<div class="scris">
		<h4><b>Alphabet Inc.</b></h4> 
		<strong><p id="priceGOOGL">Sell price: </p></strong>
		<?php include 'own.php';
		echo "<strong>Owned: {$result[5]['QUANTITY']}</strong>";
		?>
		</div>
		<form action="sell.php" method="post" id="google">
			<input type="hidden" name="title" value="Alphabet Inc.">
			<input type="hidden" name="price" id="pretGoogle">
		</form>
		<input type="submit" name="buy" value='Sell' form="google" class="button" >
	  </div>
	</div>
	</main>
	</section>
    <footer>
    &copy; 2020 Proiectarea sistemelor de baze de date
    </footer>
    </body>
</html>