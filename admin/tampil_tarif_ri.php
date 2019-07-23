<div align="center">
    <h1><label class="label label-success">Data Tarif Rawat Inap</label></h1>
    <br>
    <button class="btn btn-primary btn-large noprint" data-toggle="modal" data-target="#tambahModal">
        <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Tarif
    </button>

    <button type="submit" class="btn btn-primary btn-large noprint" onclick="window.print();return false;"><i class="glyphicon glyphicon-print"></i>  Print </button>
    <style>
        @media print {
            .noprint {
                display: none;
            }
        }
    </style>

</div>
<br>
<table id="datatable" class="display stripe">
    <thead>
    <th>No</th>
    <th>ID Tarif</th>
    <th>Perawatan</th>
    <th>Pelayanan</th>
    <th>Tipe Kamar</th>
    <th>Tarif</th>
    <th>Kapasitas</th>
    <th class="noprint">Aksi</th>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM tbl_tarif_ri order by id_tarif_ri desc";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?> </td>
                <td><?php echo $row['id_tarif_ri']; ?> </td>
                <td><?php echo $row['perawatan']; ?> </td>
                <td><?php echo $row['pelayanan']; ?> </td>
                <td><?php echo $row['tarif']; ?> </td>
                <td><?php echo $row['tipe_kamar']; ?> </td>
                <td><?php echo $row['kapasitas']; ?> </td>
                <td class="noprint"><?php echo "<a class='btn btn-info btn-sm ' href='admin.php?view=tampil_ubah_tarif_ri&id_tarif_ri=" . $row['id_tarif_ri'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a class='btn btn-danger btn-sm ' href='admin.php?view=aksi_hapus_tarif_ri&id_tarif_ri=" . $row['id_tarif_ri'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data tarif tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
                    ?></td>
            </tr>
            <?php
            $no ++;
        }
    } else {
        echo"kosong";
    }
    ?>
    </tbody>
    <tfoot class="noprint">
    <th>No</th>
    <th>ID Tarif</th>
    <th>Perawatan</th>
    <th>Pelayanan</th>
    <th>Tipe Kamar</th>
    <th>Tarif</th>
    <th>Kapasitas</th>
    <th>Aksi</th>
    </tfoot>
</table>

<!---------------------------- tambah ------------------------->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Data Tarif Baru</h4>
            </div>
            <div class="modal-body">
                <form name="tambah_tarif" id="tambah_tarif_ri" method="POST">
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil-square"></i>
                        </span>
                        <input type="text" name="perawatan" placeholder="Perawatan" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil-square-o"></i>
                        </span>
                        <input type="text" name="pelayanan" placeholder="Pelayanan" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-hospital-o"></i>
                        </span>
                        <input type="text" name="tipe_kamar" placeholder="Tipe Kamar" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-money"></i>
                        </span>
                        <input type="text" name="tarif" placeholder="Tarif" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-list-ol"></i>
                        </span>
                        <input type="text" name="kapasitas" placeholder="Kapasitas" class="form-control input-lg" required autofocus  />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-inverse" id="reset"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                <button type="submit" class="btn btn-primary" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->

<script type="text/javascript">
    $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "admin/aksi_tambah_tarif_ri.php",
            data: $('form#tambah_tarif_ri').serialize(),
            success: function (msg) {
                alert(msg)
                $("#tambahModal").modal('hide')
                location.href = 'admin.php?view=tampil_tarif_ri';
                ;
            },
            error: function () {
                alert("Gagal menambah tarif baru");
            }
        });
    });
</script>





