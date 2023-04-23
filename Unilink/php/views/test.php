<?php
$random_digits = array();
//generate 10 random digits
for($i=0; $i<10; $i++){
    $random_digits[]= mt_rand(0,9);
    echo $random_digits[$i];
}
//concatenate random digits
$joinDigits=implode('',$random_digits);
//convert to string to int
$voucher = intval($joinDigits);
echo "<br>";
echo $voucher+1;
?>