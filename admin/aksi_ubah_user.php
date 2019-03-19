<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "update tbl_user set username='$username', password='$password', status = '$status', hak_akses = '$hak_akses', grup = '$grup' where id_user='$id_user' ";
mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
?>
<script type="text/javascript">
    location.href = '../admin.php?view=tampil_user';
</script>