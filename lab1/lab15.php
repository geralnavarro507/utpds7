<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laboratorio 1.3</title>
</head>
<body>
<?php
define ('TAM',10);
echo "<table border=1>";
$n=1;
for ($n1=1; $n1 <=TAM ; $n1++) {
    echo "<tr bgcolor=#bdc3d6>";
    for ($n2=1; $n2 <=TAM ; $n2++) {
        echo "<td>", $n, "</td>";
        $n=$n+1;
    }
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>