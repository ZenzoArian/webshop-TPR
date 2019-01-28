<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>T.N.I</title>
      <link rel="shortcut icon" type="image/png" href="image/logo-T-BG.png">
    <style media="screen">
    * {box-sizing: border-box;}

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .header {
      overflow: hidden;
      background-color: #f1f1f1;
      padding: 20px 10px;
    }

    .header a {
      float: left;
      color: black;
      text-align: center;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
      line-height: 25px;
      border-radius: 4px;
    }

    .header a.logo {
      font-size: 25px;
      font-weight: bold;
    }

    .header a:hover {
      background-color: #ddd;
      color: black;
    }

    .header a.active {
      background-color: dodgerblue;
      color: white;
    }

    .header-right {
      float: right;
    }

    @media screen and (max-width: 500px) {
      .header a {
        float: none;
        display: block;
        text-align: left;
      }

      .header-right {
        float: none;
      }
    }
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background-image: linear-gradient(to right, #3d3e43, #595961);
      color: white;
    }
    </style>
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

<?php
try {
  require "../config.php";
  require "../common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM users";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>


<table>
  <thead>
    <tr>
      <th>Artikelnummer</th>
      <th>ArtikelAantal</th>
      <th>Date</th>
    </tr>
  </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo escape($row["artikelnummerData"]); ?></td>
        <td><?php echo escape($row["artikelAantal"]); ?></td>
        <td><?php echo escape($row["date"]); ?> </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
