<?php
function writeName($fname,$punctuation)
{
    $s1 = $fname . " Refsnes" . $punctuation . "<br>";
    return $s1;
}
 
echo "My name is ";
echo writeName("Kai Jim",".");
echo "My sister's name is ";
echo writeName("Hege","!");
echo "My brother's name is ";
echo writeName("Ståle","?");

?>