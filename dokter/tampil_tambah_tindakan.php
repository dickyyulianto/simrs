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
                <form name="ubah_pri" id="ubah_pri" method="POST" action="dokter/aksi_ubah_pri.php ">
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
                            <i class="glyphicon glyphicon-list-alt"></i>
                        </span>
                        <input type="text" id="perawatan" readonly name="perawatan" placeholder="Perawatan" value="<?php echo $row['perawatan']?>" class="form-control input-lg" required style="width: 33.3%;" />
                        <input type="text" id="pelayanan" readonly name="pelayanan" placeholder="Pelayanan" value="<?php echo $row['pelayanan']?>" class="form-control input-lg" required style="width: 33.3%;"/>
                        <input type="text" id="tipe_kamar" readonly name="tipe_kamar" placeholder="Tipe Kamar" value="<?php echo $row['tipe_kamar']?>" class="form-control input-lg" required style="width: 33.3%;"/>
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-list-alt"></i>
                        </span>
                    </div>
                    <!--                    <div class="input-group input-lg">-->
                    <!--                        <span class="input-group-addon">-->
                    <!--                            <i class="glyphicon glyphicon-calendar"></i>-->
                    <!--                        </span>-->
                    <!--                        <input type="text" id="tipe_kamar" readonly name="tipe_kamar" placeholder="Tipe Kamar" value="--><?php //echo $row['tipe_kamar']?><!--" class="form-control input-lg" required style="width: 50%;"/>-->
                    <!--                        <input type="text" id="tipe_kamar" readonly name="tipe_kamar" placeholder="Tipe Kamar" value="--><?php //echo $row['tipe_kamar']?><!--" class="form-control input-lg" required style="width: 50%;"/>-->
                    <!--                        <span class="input-group-addon">-->
                    <!--                            <i class="glyphicon glyphicon-calendar"></i>-->
                    <!--                        </span>-->
                    <!--                    </div>-->
                    <!--                    <div align="center">-->
                    <!--                        Jenis Perawatan<br>-->
                    <!--                        <div id="perawatan" class="btn-group" data-toggle="buttons">-->
                    <!--                            <label class="btn btn-info --><?php //echo $row['perawatan'] == 'Rawat Inap per hari' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="perawatan1" name="perawatan" value="Rawat Inap per hari"  --><?php //echo $row['perawatan'] == 'Rawat Inap per hari' ? 'checked':''; ?><!-->
                    <!--                            </label>-->
                    <!--                            <label class="btn btn-info --><?php //echo $row['perawatan'] == 'Ruang ICU' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="perawatan2" name="perawatan" value="Ruang ICU" --><?php //echo $row['perawatan'] == 'Ruang ICU' ? 'checked':''; ?><!-->
                    <!--                            </label>-->
                    <!--                            <label class="btn btn-info --><?php //echo $row['perawatan'] == 'Perinatologi' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="perawatan3" name="perawatan" value="Perinatologi" --><?php //echo $row['perawatan'] == 'Perinatologi' ? 'checked':''; ?><!-->
                    <!--                            </label> -->
                    <!--                        </div>-->
                    <!--                        <br>Jenis Pelayanan<br>-->
                    <!--                        <div class="btn-group" data-toggle="buttons">-->
                    <!---->
                    <!--                            <label class="btn btn-info --><?php //echo $row['pelayanan'] == 'Dokter Spesials dan Umum' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="pelayanan1" name="pelayanan" value="Dokter Spesials dan Umum" --><?php //echo $row['pelayanan'] == 'Perinatologi' ? 'checked':''; ?><!-->
                    <!--                            </label>-->
                    <!--                            <label class="btn btn-info --><?php //echo $row['pelayanan'] == 'Dokter Umum' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="pelayanan2" name="pelayanan" value="Dokter Umum" --><?php //echo $row['pelayanan'] == 'Dokter Umum' ? 'checked':''; ?><!-->
                    <!--                            </label>-->
                    <!--                            <label class="btn btn-info --><?php //echo $row['pelayanan'] == 'Instalasi  Anestesi' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="pelayanan3" name="pelayanan" value="Instalasi  Anestesi" --><?php //echo $row['pelayanan'] == 'Instalasi  Anestesi' ? 'checked':''; ?><!-->
                    <!--                            </label> -->
                    <!--                            <label class="btn btn-info --><?php //echo $row['pelayanan'] == 'Gizi Rawat Inap' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="pelayanan4" name="pelayanan" value="Gizi Rawat Inap" --><?php //echo $row['pelayanan'] == 'Gizi Rawat Inap' ? 'checked':''; ?><!-->
                    <!--                            </label> -->
                    <!--                        </div>-->
                    <!--                        <br>Fasilitas<br>-->
                    <!--                        <div class="btn-group" data-toggle="buttons">-->
                    <!--                            <label class="btn btn-info --><?php //echo $row['tipe_kamar'] == 'Kelas VIP' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="tipe_kamar1" name="tipe_kamar" value="Kelas VIP" --><?php //echo $row['tipe_kamar'] == 'Kelas VIP' ? 'checked':''; ?><!-->
                    <!--                            </label>-->
                    <!--                            <label class="btn btn-info --><?php //echo $row['tipe_kamar'] == 'Kelas I' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="tipe_kamar2" name="tipe_kamar" value="Kelas I" --><?php //echo $row['tipe_kamar'] == 'Kelas I' ? 'checked':''; ?><!-->
                    <!--                            </label>-->
                    <!--                            <label class="btn btn-info --><?php //echo $row['tipe_kamar'] == 'Kelas II' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="tipe_kamar3" name="tipe_kamar" value="Kelas II" --><?php //echo $row['tipe_kamar'] == 'Kelas II' ? 'checked':''; ?><!-->
                    <!--                            </label> -->
                    <!--                            <label class="btn btn-info --><?php //echo $row['tipe_kamar'] == 'Kelas III' ? 'active':''; ?><!--">-->
                    <!--                                <input type="radio" id="tipe_kamar4" name="tipe_kamar" value="Kelas III" --><?php //echo $row['tipe_kamar'] == 'Kelas III' ? 'checked':''; ?><!-->
                    <!--                            </label> -->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" id="tanggal_checkin" readonly name="tanggal_checkin" placeholder="Tanggal Check In" value="<?php echo $row['tanggal_checkin']?>" class="form-control input-lg" required style="width: 50%;" />
                        <input type="date" id="tanggal_checkout"  name="tanggal_checkout" placeholder="Tanggal Check Out" value="<?php echo $row['tanggal_checkout']?>" class="form-control input-lg" required style="width: 50%;"/>
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
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
                    <div align="right">
                        <button type="submit" class="btn btn-primary btn-lg" id="submit"><i class="glyphicon glyphicon-check"></i> Selesai </button>
                    </div>
                </form>

            </div>

            <div class="row"></div>

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Daftar Tindakan</h4>
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
                        $queryselect = "select * from tbl_tindakan
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

            <div class="row"></div>

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Tambah Tindakan</h4>
            </div>
            <div class="modal-body">
                <form name="ubah_pri" id="ubah_pri" method="POST" action="dokter/aksi_tambah_tindakan.php ">
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </span>
                        <input type="hidden" value="<?php echo $id_ubah; ?>" name="id_ri" />
                        <input type="hidden" value="<?php echo $row['id_ri']; ?>" name="id_ri" readonly id="id_pasien_hidden" />
                        <input type="hidden" value="<?php echo $row['id_pasien']; ?>" name="id_pasien" readonly id="id_pasien_hidden" />
                        <input type="hidden" value="<?php echo $row['nama_pasien']; ?>" readonly class="form-control input-lg" placeholder="Masukan ID / Nama Pasien" required autocomplete="off" />
                        <input type="hidden" value="<?php echo $_SESSION['id_user']; ?>" name="id_dokter" readonly class="form-control input-lg" placeholder="Masukan ID / Nama Pasien" required autocomplete="off" />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" id="tanggal" name="tanggal" placeholder="Tanggal Periksa" class="form-control input-lg" required style="width: 50%;" />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-check"></i>
                        </span>
                        <textarea name="tindakan"  class="form-control input-lg" placeholder="Tindakan" id="" cols="30" rows="5"></textarea>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-check"></i>
                        </span>
                        <textarea name="hasil" class="form-control input-lg" placeholder="Hasil Tindakan" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-check"></i>
                        </span>
                        <textarea name="resep" class="form-control input-lg" placeholder="Resep" id="" cols="30" rows="5"></textarea>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i>Rp</i>
                        </span>
                        <textarea name="biaya_tindakan" class="form-control input-lg" placeholder="Biaya Tindakan" id="" cols="30" rows="1"></textarea>
                    </div>

                    <div align="center">
                        <button type="reset" class="btn btn-inverse btn-lg"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        <button type="submit" class="btn btn-primary btn-lg" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
                    </div>
                </form>
            </div>


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

