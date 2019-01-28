<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>T.N.I</title>
	<link rel="stylesheet" href="css.css">
	  <link rel="shortcut icon" type="image/png" href="image/logo-T-BG.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>


<?php
session_start();



$dam = $_SESSION["artikelnummerWeb2"];
$artikelAantalNew = $_SESSION["artikelAantalNew"];
$tekst = $_SESSION["tekst"];
$hoeVaak = $_SESSION["hoeVaak"];


?>

<div class="header">
			<img src="image/logo-T-BG.png" alt="banner" width="100rem" height="auto">
<a href="#default" class="logo"></a>
<div class="header-right">
	<a class="active" href="buySite.php">Home</a>
    <a href="update.php">Database</a>
</div>
</div>

<br>
<div class="wrap">
<div class="pic">

	<img src="image/tran-Done.png" alt="banner" width="500rem" height="auto" class="img">
</div>

<div class="info">
<p>top kwaliteit T-shirt</p>
<p>prijs: €12,99</p>
<br>
<div class="select">


<form action="#" method="post">
<p>tekst voor op het T-shirt:</p>
<p><?php echo $tekst ?></p>
<br>
<br>
dit T-shirt is
<?php echo $hoeVaak ?> keer besteld.
<br>
<p>jouw artikelnummer:</p>
<?php echo $dam ?>
<br>
<br>
<br>
dit product is er nog <?php echo $artikelAantalNew ?> keer.

</body>
</html>
