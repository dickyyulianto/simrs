<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "insert into tbl_pasien values(null,'$NIK', '$nama','$alamat', '$jenis_kelamin', '$pekerjaan','$no_telepon', '$nama_pj', '$alamat_pj', '$no_tlp_pj' ) ";
mysqli_query($db_handle, $query);