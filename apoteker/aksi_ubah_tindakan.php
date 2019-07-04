<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "update tbl_tindakan set harga_resep = '$harga_resep' where id_tindakan ='$id_tindakan'";
mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
header("location:../apoteker.php?view=tampil_pri");