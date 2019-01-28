<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      body {
          background-image: linear-gradient(to right, #3d3e43, #595961);
      }
    </style>
  </head>
  <body>
    <div style="display: none">

    <a href="read.php">Back to read</a>
    <a id="goBack" href="bought.php">Back to home</a>
<?php
session_start();


$artikelAantalData = $_SESSION["artikelAantalData"];
$dam2 = $_SESSION["hoeVaak"];

echo $artikelAantalData;


?>
<?php
   $artikelAantalNew = $artikelAantalData - $dam2;
   echo $artikelAantalNew;
require "../config.php";
require "../common.php";
if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $user =[
      "id"        => $_POST['id'],
      "artikelAantal2"       => $artikelAantalNew
    ];
    $sqlT = "UPDATE users
            SET artikelAantal = :artikelAantal2
            WHERE id = :id";

  $statement = $connection->prepare($sqlT);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sqlT . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];
    $sqlT = "SELECT * FROM users WHERE id = :id";
    $statement = $connection->prepare($sqlT);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sqlT . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>
<?php
session_start();


$_SESSION["artikelAantalNew"] = $artikelAantalNew;
?>
<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>

  <blockquote><?php echo escape($_POST['artikelnummerData']); ?> successfully updated.</blockquote>
  <script type="text/javascript">

  window.stop();
  var linkPage = document.getElementById('goBack').href;
  window.location.href = linkPage;
  console.log("wat");
  </script>
<?php endif; ?>

<h2>Edit a user</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input id="submit" type="submit" name="submit" value="Submit">
</form>

<a href="read.php">Back to read</a>
<a id="goBack" href="index2.php">Back to home</a>

<?php require "templates/footer.php"; ?>




<script type="text/javascript">
  document.getElementById("submit").click();


  function init(){
    setTimeout(function(){
      //do what you need here
      var linkPage = document.getElementById('goBack').href;
      window.location.href = linkPage;
    }, 2000);
  }

  onload=init;
</script>


</div>

</body>
</html>
