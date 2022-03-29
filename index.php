<!DOCTYPE html>
<html>
    <head>

    <link rel="stylesheet" href="style.css">
    </head>
<body>







<form action="index.php" method="get">
    
<h1>Стока от магазин "Успех" Пловдив</h1>
Задайте името на стоката: <input type="text" name="name"><br>
Задайте количество на стоката: <input type="number" name="quantity"><br>
Задайте обща сума с ДДС: <input type="number" name="finalPrice"><br>
Задайте ДДС в момента в %: <input type="number" name="ddsPercent"><br>
<input type="submit" name="submit" value="Потвърдете">

</form>
<br>


<?php 
$name = "";
$quantity = "";
$finalPrice = "";
$ddsPercent = "";
$singlePriceWithoutDds = "";

if(isset($_GET['submit'])){
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
if (isset($_GET['quantity'])) {
    $quantity = $_GET['quantity'];
}
if (isset($_GET['finalPrice'])) {
    $finalPrice = $_GET['finalPrice'];
}
if (isset($_GET['ddsPercent'])) {
    $ddsPercent = $_GET['ddsPercent'];
    $singlePriceWithoutDds = round(($finalPrice / $quantity) / (1 + ($ddsPercent / 100)),2);
}
}


?>

<h3>Изчусляване на единична цена на стока без ДДС</h3>
<table>
<tr >
    <td>Име на стоката</td>
    <td><?php echo $name ?></td>
  </tr>

  <tr>
    <td>Количество</td>
    <td><?php echo $quantity ?></td>
  </tr>
  <tr>
    <td>Обща сума с ДДС</td>
    <td><?php echo $finalPrice ?></td>
  </tr>
  <tr>
    <td>ДДС в %</td>
    <td><?php echo $ddsPercent ?></td>
  </tr>
  <tr>
    <td>Единична цена без ДДС</td>
    <td><?php
    echo $singlePriceWithoutDds; ?></td>
  </tr>

</table>
<br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="reset" value="Изчисти таблицата">
</form>


</body>
</html>