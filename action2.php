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
$start = $_GET["start"];
$stop = $_GET["stop"];
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.client
    join $db.seanse 
    on $db.client.id_client = $db.seanse.fid_client
    WHERE $db.seanse.start >= :start and $db.seanse.stop <= :stop" );
$sqlSelect->execute(array('start' => $start, 'stop' => $stop));
echo "Сатистика за указанный временной интервал:";
echo "<table border = 1>";
echo "<tr><th>Name</th><th>Balance</th><th>Start</th><th>End</th><th>In</th><th>Out</th></tr>";
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<tr><td>$cell[1]</td><td>$cell[5]</td><td> $cell[7]</td><td>$cell[8]</td><td>$cell[9]</td><td>$cell[10]</td></tr>";
}
echo "</table>";
?>
</body>
</html>