<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Transaksi Laundry</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br/><br/>

                <?php
                $id = $_GET['id'];
                $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id'") or die(mysqli_error($koneksi));
                while ($t = mysqli_fetch_array($transaksi)) {
                ?>
                    <form method="post" action="transaksi_update.php">
                        <input type="hidden" name="id" value="<?php echo $t['id_transaksi']; ?>">

                        <div class="form-group">
                            <label>Pelanggan</label>
                            <select class="form-control" name="pelanggan" required="required">
                                <option value="">- Pilih Pelanggan</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <option <?php if ($d['id_pelanggan'] == $t['transaksi_pelanggan']) {
                                        echo "selected='selected'";
                                    } ?> value="<?php echo $d['id_pelanggan']; ?>">
                                        <?php echo $d['nama_pelanggan']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Berat</label>
                            <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required="required" value="<?php echo $t['berat_transaksi']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Tgl. Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" required="required" value="<?php echo $t['tgl_selesai']; ?>">
                        </div>

                        <br/>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Jenis Pakaian</th>
                                <th width="20%">Jumlah</th>
                            </tr>

                            <?php
                            $id_transaksi = $t['id_transaksi'];
                            $pakaian = mysqli_query($koneksi, "SELECT * FROM pakaian WHERE transaksi_pakaian='$id_transaksi'");
                            while ($p = mysqli_fetch_array($pakaian)) {
                                ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?php echo $p['jenis_pakaian']; ?>"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?php echo $p['jumlah_pakaian']; ?>"></td>
                                </tr>
                            <?php } ?>
                            <!-- Tambahan baris kosong untuk entri baru -->
                            <?php for ($i = 0; $i < 4; $i++) { ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                </tr>
                            <?php } ?>
                        </table>

                        <div class="form-group alert alert-info">
                            <label>Status</label>
                            <select class="form-control" name="status" required="required">
                                <option <?php if ($t['status_transaksi'] == "0") {
                                    echo "selected='selected'";
                                } ?> value="0">PROSES</option>
                                <option <?php if ($t['status_transaksi'] == "1") {
                                    echo "selected='selected'";
                                } ?> value="1">DI CUCI</option>
                                <option <?php if ($t['status_transaksi'] == "2") {
                                    echo "selected='selected'";
                                } ?> value="2">SELESAI</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Ubah">
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
