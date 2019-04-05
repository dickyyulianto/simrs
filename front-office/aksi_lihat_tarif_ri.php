<?php
//$connection = mysqli_connect("localhost", "root", "", "sirusak");
include '../konfig.php';

$perawatan = mysqli_real_escape_string($db_handle, $_GET['perawatan']);
$pelayanan = mysqli_real_escape_string($db_handle, $_GET['pelayanan']);
$tipe_kamar = mysqli_real_escape_string($db_handle, $_GET['tipe_kamar']);

//mysqli_select_db($db_handle, "sirusak_tek");
$result = mysqli_query($db_handle, "SELECT * FROM tbl_tarif_ri WHERE perawatan = '$perawatan' and pelayanan = '$pelayanan' and tipe_kamar = '$tipe_kamar' ");
 
while($row = mysqli_fetch_array($result))
  {
    echo '<div>';
    echo '<h3 id="id_tarif">'.$row['id_tarif_ri'].'</h3>';
    echo '<h3 id="tarif">'.$row['tarif'].'</h3>';
    echo '</div>';
  }
 
mysqli_free_result($result);
//mysqli_close($connection);

?>