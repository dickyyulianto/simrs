<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "insert into tbl_tarif_ri values(null,'$perawatan','$pelayanan', '$tarif', '$tipe_kamar', '$kapasitas') ";
mysqli_query($db_handle, $query);