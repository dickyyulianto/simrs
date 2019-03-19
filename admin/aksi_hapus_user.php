<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'konfig.php';
$id_user = $_GET['id_user'];
$query = "delete from tbl_user where id_user='$id_user'";
mysqli_query($db_handle, $query);
?>
<script type="text/javascript">
    location.href = 'admin.php?view=tampil_user';
</script>