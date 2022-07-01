<?php include "connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "connection.php";
$where = 0;
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.client 
    WHERE $db.client.balance < :balance");
$sqlSelect->execute(array('balance' => $where));

echo "Пользователи с отрицательным балансом";
echo "<table border=1>";
echo "<tr><th>Name</th><th>IP</th><th>Balance</th></tr>";
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<tr><td>$cell[1]</td><td>$cell[4]</td><td>$cell[5]</td></tr>";
}
echo "</table>"
?>
</body>
</html>