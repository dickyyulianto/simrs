<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'konfig.php';
$id_pasien = $_GET['id_pasien'];
$query = "delete from tbl_pasien where id_pasien='$id_pasien'";
mysqli_query($db_handle, $query);
?>
<script type="text/javascript">
location.href = 'front-office.php?view=tampil_pasien';
</script>
