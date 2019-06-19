<?php
if (isset($_GET)) {
    include 'konfig.php';
    $id_ubah = $_GET['no_rj'];
    $query = "SELECT * FROM tbl_prj, tbl_pasien where "
        . "tbl_prj.id_pasien = tbl_pasien.id_pasien and "
        . "no_rj = '$id_ubah'";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Input Pembayaran</h4>
            </div>
            <div class="modal-body">
                <form name="edit_prj" id="edit_prj" method="POST" action="Kasir/aksi_ubah_prj.php">
                    <input type="hidden" name="no_rj" value="<?php echo $id_ubah; ?>"/>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"> </i>
                        </span>
                        <input type="hidden"  value="<?php echo $row['id_pasien']; ?>" name="id_pasien" id="id_pasien_hidden" />
                        <input type="text" readonly value="<?php echo $row['nama_pasien']; ?>" name="search" class="search form-control input-lg" id="searchid" placeholder="Masukan ID / Nama Pasien"   />
                        <div id="result"></div>
                    </div>
                    <div class="input-group input-lg ">
                        <span class="input-group-addon">
                            <i class="fa fa-hospital-o fa-lg"></i>
                        </span>
                        <input type="text" readonly value="<?php echo $row['departemen']; ?>" name="departemen"  id="departemen" placeholder="Departemen"  class="form-control input-lg"   />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">Tindakan</span>
                        <input type="text" name="keluhan" readonly value="<?php echo $row['tindakan']; ?>" placeholder="Tindakan" class="form-control input-lg" required />
                        <span class="input-group-addon">Resep</span>
                        <input type="text" name="diagnosa" readonly value="<?php echo $row['resep']; ?>" placeholder="Resep" class="form-control input-lg" required />
                    </div>
                    <div class="input-group input-lg"  style="width: 50%">
                        <span class="input-group-addon" style="width: 50%">Biaya Tindakan (Rp)</span>
                        <input type="text" id="biaya" value="<?php echo $row['biaya']; ?>" name="biaya" placeholder="Biaya Tindakan" class="form-control input-lg"  readonly required  />
                        <span class="input-group-addon">,-</span>
                    </div>
                    <div class="input-group input-lg" style="width: 50%">
                        <span class="input-group-addon" style="width: 50%" >Harga Obat (Rp)</span>
                        <input type="text" id="biaya" value="<?php echo $row['harga_resep']; ?>" name="biaya" placeholder="Biaya Resep" class="form-control input-lg" value="" readonly required />
                        <span class="input-group-addon">,-</span>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon"style="width: 20%">Total Biaya (Rp)</span>
                        <input type="text" id="biaya" value="<?php echo $row['harga_resep'] + $row['biaya']; ?>" name="biaya" placeholder="Total Biaya" class="form-control input-lg" value="" readonly required />
                        <span class="input-group-addon">,-</span>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon"style="width: 20%">Pembayaran (Rp)</span>
                        <input type="text" name="bayar" value="<?php echo $row['bayar']; ?>" placeholder="Bayar" class="form-control input-lg" value="" readonly required />
                        <span class="input-group-addon">,-</span>
                    </div>
                    <div align="center">
                        <button type="reset" class="btn btn-inverse btn-lg noprint"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        <button type="submit" class="btn btn-primary btn-lg noprint" onclick="window.print();return false;"><i class="glyphicon glyphicon-print"></i>  Print </button>
                        <button type="submit" class="btn btn-primary btn-lg noprint" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
                    </div>
                </>
            </div>

            <style>
                @media print {
                    .noprint {
                        display: none;
                    }
                }
            </style>

            <script type="text/javascript">
                $(function() {
                    $(".search").keyup(function()
                    {
                        var searchid = $(this).val();
                        var dataString = 'search=' + searchid;
                        if (searchid != '')
                        {
                            $.ajax({
                                type: "POST",
                                url: "front-office/cari-pasien.php",
                                data: dataString,
                                cache: false,
                                success: function(html)
                                {
                                    $("#result").html(html).show();
                                }
                            });
                        }
                        return false;
                    });

                    jQuery("#result").live("click", function(e) {
                        var $clicked = $(e.target);
                        var $id = $clicked.find('.id').html();
                        var $nama = $clicked.find('.nama').html();
                        var dec_id = $("<div/>").html($id).text();
                        var dec_nama = $("<div/>").html($nama).text();
                        $('#id_pasien_hidden').val(dec_id);
                        $('#searchid').val(dec_nama);
                    });
                    jQuery(document).live("click", function(e) {
                        var $clicked = $(e.target);
                        if (!$clicked.hasClass("search")) {
                            jQuery("#result").fadeOut();
                        }
                    });
                    $('#searchid').click(function() {
                        jQuery("#result").fadeIn();
                    });
                });
            </script>

            <script type="text/javascript" language="javascript">
                $(document).ready(function() {
                    $("#departemen").change(function(event) {
                        var selectvalue = $(this).val();
                        $.ajax({
                            url: 'front-office/aksi_lihat_tarif_rj.php?departemen=' + selectvalue,
                            success: function(tarif) {
                                document.getElementById('biaya').value = tarif;
                            }
                        });
                    });
                });
            </script>
            <?php
        }
    }
}

