<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "update tbl_tarif_ri set perawatan='$perawatan', pelayanan='$pelayanan', tipe_kamar = '$tipe_kamar', tarif = '$tarif', kapasitas = '$kapasitas' where id_tarif_ri='$id_tarif_ri' ";
mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
?>
<script type="text/javascript">
    location.href = '../admin.php?view=tampil_tarif_ri';
</script>