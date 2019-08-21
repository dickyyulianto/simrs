<div align="center">
    <h1><label class="label label-warning">Riwayat Periksa Pasien </label></h1>
    <br>
    <a type="button" class="btn btn-inverse btn-lg" href="front-office.php?view=tampil_pasien"><i class="glyphicon glyphicon-refresh" ></i> Kembali </a>
</div>
<table id="datatable" class="display stripe">
    <thead>
    <th>No RJ</th>
    <th>Tanggal</th>
    <th>Departement</th>
    <th>Dokter</th>
    <th>Keluhan</th>
    <th>Diagnosa</th>
    <th>Tindakan</th>
    <th>Resep</th>
</thead>
<tbody>
    <?php
    $id_p = $_GET['id_p'];
    $query = "SELECT * FROM tbl_prj, tbl_dokter where tbl_prj.id_dokter = tbl_dokter.id_user and id_pasien = $id_p order by tanggal desc";
//    $query = "SELECT p.nama_pasien, rj.* FROM tbl_prj rj left join tbl_pasien p on rj.id_pasien=p.id_pasien left join tbl_dokter d on d.id_user = rj.id_dokter where d.nama_dokter = '" . $_SESSION['grup'] . "' order by rj.tanggal desc";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        //echo"ada isinya";	
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td class="no_rj"><?php echo $row['no_rj']; ?> </td>
                <td class="tanggal"><?php echo $row['tanggal']; ?> </td>
                <td class="departemen"><?php echo $row['departemen']; ?> </td>
                <td class="departemen"><?php echo $row['nama_dokter']; ?> </td>
                <td class="keluhan"><?php echo $row['keluhan']; ?> </td>
                <td class="diagnosa"><?php echo $row['diagnosa']; ?> </td>
                <td class="tindakan"><?php echo $row['tindakan']; ?> </td>
                <td class="resep"><?php echo $row['resep']; ?> </td>

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
<th>Tanggal</th>
<th>Departement</th>
<th>Dokter</th>
<th>Keluhan</th>
<th>Diagnosa</th>
<th>Tindakan</th>
<th>Resep</th>
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

