<div align="center">
    <h1><label class="label label-warning">Riwayat Periksa Pasien </label></h1>
    <br>
    <a type="button" class="btn btn-inverse btn-lg" href="dokter.php?view=tampil_pasien_dokter"><i class="glyphicon glyphicon-refresh" ></i> Kembali </a>
</div>
<div class="modal-body">
    <div class="row">
        <table id="datatable" class="display stripe">
            <thead>
            <th>No</th>
            <th>Dokter</th>
            <th>Tanggal</th>
            <th>Tindakan</th>
            <th>Hasil</th>
            <th>Resep</th>
            <th>Biaya Tindakan</th>
            </thead>
            <tbody>
            <?php
            $queryselect = "select * from tbl_pri, tbl_tindakan
                    inner join tbl_user on tbl_tindakan.id_user=tbl_user.id_user where tbl_tindakan.id_pri = $id_ubah";
            $resultselect = mysqli_query($db_handle, $queryselect );
            if (mysqli_num_rows($resultselect)) {
                //echo "ada isinya";
                $no = 1;
                while ($tindakan = mysqli_fetch_array($resultselect)) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?> </td>
                        <td><?php echo $tindakan['grup']; ?> </td>
                        <td><?php echo $tindakan['tanggal']; ?> </td>
                        <td><?php echo $tindakan['tindakan']; ?> </td>
                        <td><?php echo $tindakan['hasil']; ?> </td>
                        <td><?php echo $tindakan['resep']; ?> </td>
                        <td><?php echo $tindakan['biaya_tindakan']; ?> </td>
                    </tr>
                    <?php
                    $no ++;
                }
            } else {
                echo"kosong";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<!---------------------------- tambah ------------------------->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Tulis Diagnosa Pasien</h4>
            </div>
            <div class="modal-body">
                <form name="ubah_pasien" id="ubah_pasien" method="POST" action="dokter/aksi_ubah_pasien_dokter.php">

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-check"></i>
                        </span>
                        <input type="text" id="no_rj" name="no_rj" value="" class="form-control input-lg" readonly>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" id="nama_pasien" name="nama" placeholder="Nama Pasien" class="form-control input-lg" readonly/>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-question-sign"></i>
                        </span>
                        <textarea name="keluhan" id="keluhan" placeholder="Keluhan Pasien" class="form-control" rows="5" readonly></textarea>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-edit"></i>
                        </span>
                        <textarea name="diagnosa" id="diagnosa" placeholder="Diagnosa" class="form-control" rows="7"></textarea>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-edit"></i>
                        </span>
                        <textarea name="tindakan" id="tindakan" placeholder="Tindakan" class="form-control" rows="7"></textarea>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-edit"></i>
                        </span>
                        <textarea name="resep" id="resep" placeholder="Resep | Anjuran " class="form-control" rows="7"></textarea>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-check"></i>
                        </span>
                        <input type="int" id="biaya" name="biaya" value="" placeholder="Biaya Tindakan" class="form-control input-lg" required>
                    </div>
            </div><!-- /.modal -->

            <!------------------------- edit -------------------->

            <script type="text/javascript">
                $(document).ready(function () {
                    $("button.edit_data").click(function () {
                        var myModal = $('#editModal');
                        // now get the values from the table
                        var no_rj = $(this).closest('tr').find('td.no_rj').html();
                        var nama_pasien = $(this).closest('tr').find('td.nama_pasien').html();
                        var keluhan = $(this).closest('tr').find('td.keluhan').html();
                        //var diagnosa = $(this).closest('tr').find('td.diagnosa').html();
                        //var tindakan = $(this).closest('tr').find('td.tindakan').html();
                        // var resep = $(this).closest('tr').find('td.resep').html();
                        //var biaya = $(this).closest('tr').find('td.biaya').html();

                        document.getElementById('no_rj').value = no_rj;
                        document.getElementById('nama_pasien').value = nama_pasien;
                        document.getElementById('keluhan').value = keluhan;
                        //document.getElementById('diagnosa').value = diagnosa;
                        //document.getElementById('tindakan').value = tindakan;
                        // document.getElementById('resep').value = resep;
                        //document.getElementById('biaya').value = biaya;
                    });
                });
            </script>