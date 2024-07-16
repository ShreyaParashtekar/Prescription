<?php

$_SESSION['cart']=array(array("product"=>"apple","quantity"=>2),
array("product"=>"Orange","quantity"=>4),
array("product"=>"Banana","quantity"=>5),
array("product"=>"Mango","quantity"=>7),
); 


$max=sizeof($_SESSION['cart']);
for($i=0; $i<$max; $i++) { 

while (list ($key, $val) = each ($_SESSION['cart'][$i])) { 
echo "$key -> $val ,"; 
} // inner array while loop
echo "<br>";
} // outer array for loop
?>