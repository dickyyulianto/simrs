<div align="center">
    <h1><label class="label label-success">Data Pasien Terdaftar</label></h1>
    <br>
    <button class="btn btn-primary btn-large" data-toggle="modal" data-target="#tambahModal">
        <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Pasien
    </button>
</div>
<br>
<table id="datatable" class="display stripe">
    <thead>
    <th>No</th>
    <th>ID Pasien</th>
    <th>NIK</th>
    <th>Nama Pasien</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>Telepon</th>
    <th>Aksi</th>
</thead>
<tbody>
    <?php
    $query = "SELECT * FROM tbl_pasien order by id_pasien desc";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        //echo"ada isinya";	
        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?> </td>
                <td><?php echo $row['id_pasien']; ?> </td>
                <td><?php echo $row['NIK']; ?>
                <td class="nama_pasien">
                    <?php echo "
                    <a href='front-office.php?view=tampil_riwayat_pasien&id_p=". $row['id_pasien']."'>". $row['nama_pasien']."</a>
                    " ?>
                </td>
                <td><?php echo $row['jenis_kelamin']; ?> </td>
                <td><?php echo $row['alamat']; ?> </td>
                <td><?php echo $row['no_telepon']; ?> </td>
                <td><?php echo "<a class='btn btn-info btn-sm' href='front-office.php?view=tampil_ubah_pasien&id_pasien=" . $row['id_pasien'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a class='btn btn-danger btn-sm' href='front-office.php?view=aksi_hapus_pasien&id_pasien=" . $row['id_pasien'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data pasien tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
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
<tfoot><th>No</th>
<th>ID Pasien</th>
<th>NIK</th>
<th>Nama Pasien</th>
<th>Jenis Kelamin</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Aksi</th></tfoot>
</table>

<!---------------------------- tambah ------------------------->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Data Pasien Baru</h4>
            </div> 
            <div class="modal-body">
                <form name="tambah_pasien" id="tambah_pasien" method="POST">

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="NIK" placeholder="NIK" class="form-control input-lg" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="nama" placeholder="Nama Pasien" class="form-control input-lg" required autofocus  />
                    </div>

                    <div class="input-group input-lg ">

                        <span class="input-group-addon">
                            
                                <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-danger">
                                    <input type="radio" id="laki_laki" name="jenis_kelamin" value="L" required><h4>Laki-Laki</h4>
                                </label>
                                <label class="btn btn-info">
                                       <input type="radio" id="perempuan" name="jenis_kelamin" value="P" required><h4>Perempuan</h4> 
                                </label>
                                </div>
                                
                        </span>

                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <input type="text" name="alamat"  placeholder="Alamat" class="form-control input-lg" required />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-tower"></i>
                        </span>
                        <input type="text" name="pekerjaan"  placeholder="Pekerjaan" class="form-control input-lg" required />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="no_telepon" placeholder="No Telepon Pasien" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="nama_pj" placeholder="Nama Penanggung Jawab" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <input type="text" name="alamat_pj"  placeholder="Alamat Penanggung Jawab" class="form-control input-lg" required />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="no_tlp_pj"  placeholder="Nomor Telepon PJ" class="form-control input-lg" required />
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
<!------------------------- edit -------------------->

<script type="text/javascript">
    $(document).ready(function () {
        $("button#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "front-office/aksi_tambah_pasien.php",
                data: $('form#tambah_pasien').serialize(),
                success: function (msg) {
                    $("#tambahModal").modal('hide')
                    location.href = 'front-office.php?view=tampil_pasien';
                    ;
                },
                error: function () {
                    alert("Gagal menambah pasien baru");
                }
            });
        });
    });
</script>

