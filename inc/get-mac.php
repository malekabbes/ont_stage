<?php
$string=exec('getmac');
$mac=substr($string, 0, 17); 
echo $mac;
?>