<?php
include("baglan.php");


$hakkindatext = $_REQUEST['hakkindatext'];
$hsorgu = mysqli_query($conn, "update hakkinda set hakkinda='".$hakkindatext."' where hakkinda_ID = '1'");   

?>