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
<?php
session_start();

$dam = $_SESSION["artikelnummerWeb2"];
$dam2 = $_SESSION["hoeVaak"];

echo $dam;
?>
<?php
	try {
		require "../config.php";
		require "../common.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT *
						FROM users
						WHERE artikelnummerData = :artikelnummerData";

						$artikelnummerData = $dam;

		$statement = $connection->prepare($sql);
		$statement->bindParam(':artikelnummerData', $artikelnummerData, PDO::PARAM_STR);
		$statement->execute();

		$result = $statement->fetchAll();
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}

?>
<?php require "templates/header.php"; ?>
<?php

	if ($result && $statement->rowCount() > 0) { ?>
		<h2>Results</h2>

		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>artikelnummerData</th>
					<th>artikelAantal</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
	<?php foreach ($result as $row) { ?>
			<tr>
				<td><?php echo escape($row["id"]); ?></td>
				<td><?php echo escape($row["artikelnummerData"]); ?></td>
				<td><?php echo escape($row["artikelAantal"]); ?></td>
				<td><?php echo escape($row["date"]); ?> </td>
				<td><a id="dynLink" href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
			</tr>
		<?php } ?>
			</tbody>
	</table>
	<?php } else { ?>
		<blockquote>No results found.</blockquote>
	<?php }
 ?>
<h2>Find user based on artikelnummerData</h2>


<script>

window.onload=function(){
document.getElementById("artikelnummerData").click();
};

</script>

<a href="index2.php">Back to home</a>
<a href="update-single.php">To update</a>

<?php require "templates/footer.php"; ?>
<?php echo escape($row["artikelAantal"]); ?>

<?php echo escape($row["id"]); ?>
<?php
$artikelAantalData = escape($row["artikelAantal"]);
session_start(); // For having the access to the session,this line must be written in the start of every PHP page.

$_SESSION["artikelAantalData"]= $artikelAantalData;
 ?>


 <script type="text/javascript">

	 function init(){

		 var linkPage = document.getElementById('dynLink').href;
		 window.location.href = linkPage;
	 }

	 onload=init;
 </script>


</div>
</body>
</html>
