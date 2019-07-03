<?php
if (isset($_GET)) {
    include 'konfig.php';
    $id_ubah = $_GET['id_ri'];
    $query = "SELECT * FROM tbl_pri, tbl_pasien, tbl_tarif_ri where "
        . "tbl_pri.id_pasien = tbl_pasien.id_pasien and tbl_tarif_ri.id_tarif_ri = tbl_pri.id_tarif_ri and "
        . "tbl_pri.id_ri = '$id_ubah'";
    $result = mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Data Rawat Inap</h4>
            </div>
            <div class="modal-body">
                <form name="ubah_pri" id="ubah_pri" method="POST" action="apoteker/aksi_ubah_pri.php ">
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="hidden" value="<?php echo $id_ubah; ?>" name="id_ri" />
                        <input type="hidden" value="<?php echo $row['id_pasien']; ?>" name="id_pasien" readonly id="id_pasien_hidden" />
                        <input type="hidden" value="<?php echo $row['id_tarif_ri']; ?>" name="id_tarif_ri" readonly id="id_tarif_ri_hidden" />
                        <input type="text" value="<?php echo $row['nama_pasien']; ?>" name="search" readonly class="search form-control input-lg" id="searchid" placeholder="Masukan ID / Nama Pasien" required autocomplete="off" />
                        <div id="result"></div>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" id="tanggal_checkin" readonly name="tanggal_checkin" placeholder="Tanggal Check In" value="<?php echo $row['tanggal_checkin']?>" class="form-control input-lg" required style="width: 50%;" />
                        </span>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i >Keluhan</i>
                        </span>
                        <input type="text" name="keluhan" readonly placeholder="Keluhan" value="<?php echo $row['keluhan']?>" class="form-control input-lg" required />
                    </div>

                    <!--                    <div class="input-group input-lg" align="center">-->
                    <!---->
                    <!--                        <span class="input-group-addon">Ruang</span>-->
                    <!--                        <input type="text" value="--><?php //echo $row['tipe_kamar']?><!--" name="tipe_kamar" id="tipe_kamar" class="form-control input-lg" readonly="" required="" style="width: 50%;text-align:center;font-size: 30;"   />-->
                    <!--                        <input type="text" value="--><?php //echo $row['hari_menginap']?><!--" name="hari_menginap" id="hari_menginap" class="form-control input-lg" readonly="" required="" style="width: 50%;text-align:center;font-size: 30;"/> -->
                    <!--                        <span class="input-group-addon">hari</span>-->
                    <!--                    </div>-->
                    <!--                    <div class="input-group input-lg">-->
                    <!--                        <span class="input-group-addon">Rp</span>-->
                    <!--                        <input type="text" id="biaya" name="biaya" placeholder="Biaya" class="form-control input-lg" value="--><?php //echo $row['biaya']?><!--" readonly required style="font-size: 25px;" />-->
                    <!--                        <span class="input-group-addon">,-</span>-->
                    <!--                    </div>-->

                </form>

            </div>

            <div class="row"></div>

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Daftar Tindakan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                        <?php
                        //                        $queryselect = "SELECT * FROM tbl_tindakan WHERE id_pri = $id_ubah  ";
                        $queryselect = "select * from tbl_tindakan 
                                         inner join tbl_dokter on tbl_tindakan.id_user=tbl_dokter.id_user where id_pri = $id_ubah";
                        $resultselect = mysqli_query($db_handle, $queryselect );
                        if (mysqli_num_rows($resultselect)) {
                            //echo "ada isinya";
                            $no = 1;
                            while ($tindakan = mysqli_fetch_array($resultselect)) {
                                ?>
                                <div class="input-group input-lg">
                                    <span class="input-group-addon"><i >Nama Pasien</i></span>
                                    <input type="text" name="nama_pasien" readonly placeholder="Nama Pasien" value="<?php echo $row['nama_pasien']?>" class="form-control input-lg" required />
                                </div>
                                <div class="input-group input-lg">
                                    <span class="input-group-addon"><i >Nama Dokter</i></span>
                                    <input type="text" name="nama_dokter" readonly placeholder="Nama Dokter" value="<?php echo $tindakan['nama_dokter']?>" class="form-control input-lg" required />
                                </div>
                                <div class="input-group input-lg">
                                    <span class="input-group-addon"><i >Resep</i></span>
                                    <input type="text" name="resep" readonly placeholder="Resep" value="<?php echo $tindakan['resep']?>" class="form-control input-lg" required />
                                </div>
                                <div class="input-group input-lg">
                                    <span class="input-group-addon"><i >Harga Resep</i></span>
                                    <input type="text" name="harga_resep"  placeholder="Harga Resep" value="<?php echo $tindakan['harga_resep']?>" class="form-control input-lg" required />
                                </div>

                                <div align="center">
                                    <button type="reset" class="btn btn-inverse btn-lg"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                                    <button type="submit" class="btn btn-primary btn-lg" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
                                </div>

<!--                                <tr>-->
<!--                                    <td>--><?php //echo $no; ?><!-- </td>-->
<!--                                    <td>--><?php //echo $tindakan['nama_dokter']; ?><!-- </td>-->
<!--                                    <td>--><?php //echo $tindakan['tanggal']; ?><!-- </td>-->
<!--                                    <td>--><?php //echo $tindakan['tindakan']; ?><!-- </td>-->
<!--                                    <td>--><?php //echo $tindakan['hasil']; ?><!-- </td>-->
<!--                                    <td>--><?php //echo $tindakan['biaya_tindakan']; ?><!-- </td>-->
<!--                                </tr>-->
                                <?php
                                $no ++;
                            }
                        } else {
                            echo"kosong";
                        }
                        ?>
                </div>
            </div>
            <!------------------------- submit form dari modal -------------------->
            <script type="text/javascript">
                $(document).ready(function () {
                    $("button#submit").click(function () {
                        $.ajax({
                            type: "POST",
                            url: "front-office/aksi_tambah_pri.php",
                            data: $('form#tambah_pri').serialize(),
                            success: function (msg) {
                                // alert("berhasil");
                                $("#tambahModal").modal('hide');
                                location.href = 'front-office.php?view=tampil_pri';
                            },
                            error: function(){
                                alert('Gagal menambah pasien rawat inap baru');
                            }
                        });
                    });
                });
            </script>




            <script type="text/javascript">
                $(function () {
                    $(".search").keyup(function ()
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
                                success: function (html)
                                {
                                    $("#result").html(html).show();
                                }
                            });
                        }
                        return false;
                    });

                    jQuery("#result").live("click", function (e) {
                        var $clicked = $(e.target);
                        var $id = $clicked.find('.id').html();
                        var $nama = $clicked.find('.nama').html();
                        var dec_id = $("<div/>").html($id).text();
                        var dec_nama = $("<div/>").html($nama).text();
                        $('#id_pasien_hidden').val(dec_id);
                        $('#searchid').val(dec_nama);
                    });
                    jQuery(document).live("click", function (e) {
                        var $clicked = $(e.target);
                        if (!$clicked.hasClass("search")) {
                            jQuery("#result").fadeOut();
                        }
                    });
                    $('#searchid').click(function () {
                        jQuery("#result").fadeIn();
                    });
                });
            </script>

            <!------------------------- lihat kalender -------------------->

            <script type="text/javascript">
                window.onload = function () {
                    new JsDatePick({
                        useMode: 2,
                        target: "tanggal_checkin",
                        dateFormat: "%Y-%m-%d",
                        yearsRange: [2000, 2025]
                    });
                    new JsDatePick({
                        useMode: 2,
                        target: "tanggal_checkout",
                        dateFormat: "%Y-%m-%d",
                        yearsRange: [2000, 2025]
                    });
                };
            </script>

            <!------------------------- lihat tarif -------------------->
            <script type="text/javascript" language="javascript">
                $(document).ready(function () {
                    $("#btn_cek_tarif").click(function () {
                        if (document.getElementById("perawatan1").checked) {
                            var perawatan = document.getElementById("perawatan1").value;
                        } else if (document.getElementById("perawatan2").checked) {
                            var perawatan = document.getElementById("perawatan2").value;
                        } else if (document.getElementById("perawatan3").checked) {
                            var perawatan = document.getElementById("perawatan3").value;
                        }

                        if (document.getElementById("pelayanan1").checked) {
                            var pelayanan = document.getElementById("pelayanan1").value;
                        } else if (document.getElementById("pelayanan2").checked) {
                            var pelayanan = document.getElementById("pelayanan2").value;
                        } else if (document.getElementById("pelayanan3").checked) {
                            var pelayanan = document.getElementById("pelayanan3").value;
                        } else if (document.getElementById("pelayanan4").checked) {
                            var pelayanan = document.getElementById("pelayanan4").value;
                        }

                        if (document.getElementById("tipe_kamar1").checked) {
                            var tipe_kamar = document.getElementById("tipe_kamar1").value;
                        } else if (document.getElementById("tipe_kamar2").checked) {
                            var tipe_kamar = document.getElementById("tipe_kamar2").value;
                        } else if (document.getElementById("tipe_kamar3").checked) {
                            var tipe_kamar = document.getElementById("tipe_kamar3").value;
                        } else if (document.getElementById("tipe_kamar4").checked) {
                            var tipe_kamar = document.getElementById("tipe_kamar4").value;
                        }

                        $.ajax({
                            url: 'front-office/aksi_lihat_tarif_ri.php?pelayanan=' + pelayanan +
                                '&perawatan=' + perawatan + '&tipe_kamar=' + tipe_kamar,
                            success: function (respon) {
                                var id = $(respon).find('#id_tarif').text();
                                var tarif = $(respon).find('#tarif').text();



                                function parseDate(str) {
                                    var mdy = str.split('-')
                                    return new Date(mdy[0], mdy[1] - 1, mdy[2]);
                                }

                                function daydiff(first, second) {
                                    return (second - first) / (1000 * 60 * 60 * 24);
                                }

                                var hari_menginap = daydiff(parseDate($('#tanggal_checkin').val()), parseDate($('#tanggal_checkout').val()));
                                document.getElementById("id_ruang").value = id;
                                document.getElementById("hari_menginap").value = hari_menginap;

                                var biaya = tarif * hari_menginap;
                                document.getElementById("biaya").value = biaya;

                            }
                        });
                    });
                });

            </script>
            <?php
        }
    }
}
