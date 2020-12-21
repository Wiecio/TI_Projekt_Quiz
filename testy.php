<?php
$tab1 = array();
$tab2 = array();

$tab1[0][0] = "D";
$tab1[0][1] = "D1";
$tab1[0][2] = "D2";
$tab1[0][3] = "D3";

$tab1[1][0] = "D";
$tab1[1][1] = "D1";
 
echo "Ilosc 0: ".count($tab1[0]);
echo "Ilosc 1: ".count($tab1[1]);
echo "<br>";

$odp = "";
for($i=0; $i<4;$i++)
{
    $odp = $odp.",".$tab1[0][$i];
}

echo $odp;


?>