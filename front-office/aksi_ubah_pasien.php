<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "update tbl_pasien set NIK='$NIK', nama_pasien='$nama', alamat='$alamat', jenis_kelamin = '$jenis_kelamin', pekerjaan = '$pekerjaan', no_telepon = '$no_telepon', nama_pj = '$nama_pj', alamat_pj = '$alamat_pj', no_tlp_pj = '$no_tlp_pj'  where id_pasien='$id_pasien' ";
mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
?>
<script type="text/javascript">
location.href = '../front-office.php?view=tampil_pasien';
</script>
