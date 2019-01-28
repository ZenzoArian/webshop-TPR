<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css.css">
  <title>T.N.I</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/png" href="image/logo-T-BG.png">
</head>

<body>
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

    <img src="image/shirt-5.png" alt="banner" width="500rem" height="auto" class="img">
  </div>

<div class="info">
  <p>top kwaliteit T-shirt</p>
  <p>prijs: €12,99</p>
<div class="select">


<form action="#" method="post">
<p>tekst voor op het T-shirt</p>
<input type="text" name="tekst">
<br>
<br>
<p>bestel het T-shirt</p>
  <input type="number" name="hoeVaak" value="1" min="1" max="20" style="width: 3em;"> keer.
<div style="display: none">

  <select id="shirt" name="keuze-shirt">
    <option value="T5-">seleteer jouw t-shirt</option>
    <option value="T1-"> t-shirt-1
    <option value="T2-"> t-shirt-2
    <option value="T3-"> t-shirt-3
    <option value="T4-"> t-shirt-4
    <option value="T5-"> t-shirt-5
    <option value="T6-"> t-shirt-6
  </select>
</div>
  <br>
  <br>
  <select id="kleur" name="keuze-kleur">
    <option value="W-">seleteer jouw kleur</option>
    <option value="W-"> Wit
    <option value="Z-"> Zwart
    <option value="R-"> Rood
    <option value="B-"> Blauw
  </select>
  <br>
  <br>
  <select id="maat" name="keuze-maat">
    <option value="M">seleteer jouw maat</option>
    <option value="S"> Small
    <option value="M"> Medium
    <option value="L"> Large
    <option value="XL"> Extra-Large
  </select>
  <br>
  <br>
  <input type="submit" name="submit" value="Buy" class="buyButton" />
</form>
</div>
</div>
</div>

  <?php
  $goSite = 0;
  if(isset($_POST['submit'])){
  $selected_val = $_POST['keuze-shirt'];
  $dam = "";
  $dam = $dam . $selected_val;
  }
  if(isset($_POST['submit'])){
  $selected_val = $_POST['keuze-kleur'];
    $dam = $dam . $selected_val;
  }
  if(isset($_POST['submit'])){
  $selected_val2 = $_POST['hoeVaak'];
    $dam2 = $selected_val2;
    echo $dam2;
  }
  if(isset($_POST['submit'])){
  $selected_val2 = $_POST['tekst'];
    $tekst = $selected_val2;
    echo $tekst;
  }
  if(isset($_POST['submit'])){
  $selected_val = $_POST['keuze-maat'];
  $dam = $dam . $selected_val;
  echo $dam;

  session_start();

  $_SESSION["artikelnummerWeb2"]= $dam;
  $_SESSION["hoeVaak"]= $dam2;
  $_SESSION["tekst"]= $tekst;
  $goSite = 1;
  }

  if ($goSite == 1) {
    header('Location: read.php');
  }
  ?>

</body>

</html>
