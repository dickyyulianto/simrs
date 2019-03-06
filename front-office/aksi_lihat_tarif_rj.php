<?php

include '../konfig.php';
$selectvalue = mysqli_real_escape_string($db_handle, $_GET['departemen']);
 
mysqli_select_db($db_handle, "sirusak_tek");
$result = mysqli_query($db_handle, "SELECT departemen, tarif FROM tbl_tarif_rj WHERE departemen = '$selectvalue'");
 
while($row = mysqli_fetch_array($result))
  {
    echo $row['tarif'];
  }
 
mysqli_free_result($result);

?>