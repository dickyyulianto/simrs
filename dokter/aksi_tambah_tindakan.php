<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "insert into tbl_tindakan values(null,'$id_ri', '$id_dokter', '$tanggal', '$tindakan', '$hasil', '$biaya_tindakan')";
mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
//echo json_encode(array('success'=>'true'));
//return true;
header("location:../dokter.php?view=tampil_tambah_tindakan&id_ri=".$id_ri);