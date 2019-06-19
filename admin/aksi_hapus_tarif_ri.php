<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'konfig.php';
$id_tarif_ri = $_GET['id_tarif_ri'];
$query = "delete from tbl_tarif_ri where id_tarif_ri='$id_tarif_ri'";
mysqli_query($db_handle, $query);
?>
<script type="text/javascript">
    location.href = 'admin.php?view=tampil_tarif_ri';
</script>