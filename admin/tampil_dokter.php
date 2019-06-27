<div align="center">
    <h1><label class="label label-success">Data Dokter</label></h1>
    <br>
    <button class="btn btn-primary btn-large noprint" data-toggle="modal" data-target="#tambahModal" noprint>
        <i class="glyphicon glyphicon-plus-sign noprint"></i> Tambah Data Dokter
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
    <th>ID Dokter</th>
    <th>Nama Dokter</th>
    <th>Departemen</th>
    <th>Jadwal Praktik</th>
    <th class=noprint>Aksi</th>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM tbl_dokter order by id_user desc";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?> </td>
                <td><?php echo $row['id_user']; ?> </td>
                <td><?php echo $row['nama_dokter']; ?> </td>
                <td><?php echo $row['departemen']; ?> </td>
                <td><?php echo $row['jadwal_praktik']; ?> </td>
                <td class=noprint><?php echo "<a class='btn btn-info btn-sm' href='admin.php?view=tampil_ubah_dokter&id_user=" . $row['id_user'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a class='btn btn-danger btn-sm' href='admin.php?view=aksi_hapus_dokter&id_user=" . $row['id_user'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data dokter tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
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
    <th>ID Dokter</th>
    <th>Nama Dokter</th>
    <th>Departemen</th>
    <th>Jadwal Praktik</th>
    <th>Aksi</th>
    </tfoot>
</table>

<!---------------------------- tambah ------------------------->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Biodata Dokter Baru</h4>
            </div>
            <div class="modal-body">
                <form name="tambah_dokter" id="tambah_dokter" method="POST">
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="nama" placeholder="Nama Dokter" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-hospital-o fa-lg"></i>
                        </span>
                        <input type="text" name="departemen" placeholder="departemen" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                        <input type="text" name="jadwal_praktik" placeholder="Jadwal Praktik" class="form-control input-lg" required autofocus  />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-inverse"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                <button type="submit" class="btn btn-primary" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->

<script type="text/javascript">
    $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "admin/aksi_tambah_dokter.php",
            data: $('form#tambah_dokter').serialize(),
            success: function (msg) {
                $("#tambahModal").modal('hide')
                location.href = 'admin.php?view=tampil_dokter';
                ;
            },
            error: function () {
                alert("Gagal menambah dokter baru");
            }
        });
    });
</script>
<!---------------------------- cetak ------------------------->
<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Cetak Data User</h4>
            </div>
            <table border="1" style="width: 100%">
                <tr>
                    <th>No</th>
                    <th>ID Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Departemen</th>
                    <th>Jadwal Praktik</th>
                </tr>
                <tbody>
                <?php
                $query = "SELECT * FROM tbl_dokter order by id_user desc";
                $result = mysqli_query($db_handle, $query);
                if (mysqli_num_rows($result)) {
                    $no = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?> </td>
                            <td><?php echo $row['id_user']; ?> </td>
                            <td><?php echo $row['nama_dokter']; ?> </td>
                            <td><?php echo $row['departemen']; ?> </td>
                            <td><?php echo $row['jadwal_praktik']; ?> </td>
                        </tr>
                        <?php
                        $no ++;
                    }
                } else {
                    echo"kosong";
                }
                ?>
                </tbody>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary " id="cetak"><i class="glyphicon glyphicon-print"></i>  Cetak </button>
                    <button type="submit" class="btn btn-primary btn-lg noprint" onclick="window.print();return false;"><i class="glyphicon glyphicon-print"></i>  Print </button>
                </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->

<script type="text/javascript">
    $("#cetak").click(function () {
        $.ajax({
            type: "POST",
            url: "admin/aksi_cetak_dokter.php",
            data: $('form#cetak_dokter').serialize(),
            success: function (msg) {
                $("#cetakModal").modal('hide')
                location.href = 'admin.php?view=tampil_dokter';
                ;
            },
            error: function () {
                alert("Gagal mencetak data dokter ");
            }
        });
    });
</script>

