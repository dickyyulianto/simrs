<div align="center">
    <h1><label class="label label-warning">Kelola Pasien Dokter</label></h1>
    <br>
</div>
<table id="datatable" class="display stripe">
    <thead>
    <th>No RJ</th>
    <th>Nama Pasien</th>
    <th>Keluhan</th>
    <th>Diagnosa</th>
    <th>Tindakan</th>
    <th>Resep</th>
    <th>Biaya</th>
    <th>Aksi</th>
</thead>
<tbody>
    <?php
    $query = "SELECT p.nama_pasien, rj.* FROM tbl_prj rj left join tbl_pasien p on rj.id_pasien=p.id_pasien left join tbl_dokter d on d.id_user = rj.id_dokter where d.nama_dokter = '" . $_SESSION['grup'] . "' order by rj.tanggal desc  ";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        //echo"ada isinya";	
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td class="no_rj"><?php echo $row['no_rj']; ?> </td>
                <td class="nama_pasien"><?php echo $row['nama_pasien']; ?> </td>
                <td class="keluhan"><?php echo $row['keluhan']; ?> </td>
                <td class="diagnosa"><?php echo $row['diagnosa']; ?> </td>
                <td class="tindakan"><?php echo $row['tindakan']; ?> </td>
                <td class="resep"><?php echo $row['resep']; ?> </td>
                <td class="biaya"><?php echo $row['biaya']; ?> </td>
                <td><?php echo '<button id="' . $row['no_rj'] . '" class="btn btn-info btn-sm edit_data" data-toggle="modal" data-target="#editModal">
                <i class="glyphicon glyphicon-edit"></i>Periksa</button>'; ?></td>
            </tr>
            <?php
        }
    } else {
        echo"kosong";
    }
    ?>
</tbody>
<tfoot>    
    <th>No RJ</th>
    <th>Nama Pasien</th>
    <th>Keluhan</th>
    <th>Diagnosa</th>
    <th>Tindakan</th>
    <th>Resep</th>
    <th>Biaya</th>
    <th>Aksi</th>
</tfoot>
</table>

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
                        <input type="int" id="biaya" name="biaya" value="" placeholder="Biaya" class="form-control input-lg" required>
                    </div>
<!--                        <div align="center">-->
<!--                         Tindakan-->
<!--                         <br>-->
<!---->
<!--                            <div class="btn-group" data-toggle="buttons">-->
<!--                                <label class="btn btn-info">-->
<!--                                    <input type="radio"  name="tindakan" value="Beri Resep" >Beri Resep-->
<!--                                </label>-->
<!--                                <label class="btn btn-danger">-->
<!--                                       <input type="radio" name="tindakan" value="Rawat Inap" >Rawat Inap-->
<!--                                </label>-->
<!--                                <label class="btn btn-success">-->
<!--                                       <input type="radio" name="tindakan" value="Rumah Sakit Rujukan" >Rumah Sakit Rujukan-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->

                    <br>
                    <div align="center">
                        <button type="reset" class="btn btn-inverse btn-lg"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        <button type="submit" class="btn btn-primary btn-lg" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
                    </div>
                </form>

            </div>

        </div> 
    </div><!-- /.modal-content --> 
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

