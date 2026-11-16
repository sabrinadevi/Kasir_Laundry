<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<style>

body{
    background:#f4f8ff;
    font-family:'Poppins',sans-serif;
}

/* ================= CARD ================= */

.transaksi-wrapper{
    background:#fff;
    border-radius:24px;
    padding:24px;
    box-shadow:0 10px 30px rgba(0,0,0,.04);
    margin-top:20px;
}

/* ================= TITLE ================= */

.section-title{
    font-size:28px;
    font-weight:700;
    color:#2563eb;
    margin-bottom:24px;
}

/* ================= GRID ================= */

.transaksi-grid{
    display:grid;
    grid-template-columns:1fr 1.2fr;
    gap:26px;
}

/* ================= FORM ================= */

.form-group{
    margin-bottom:18px;
}

.form-group label{
    display:block;
    font-size:14px;
    font-weight:600;
    color:#334155;
    margin-bottom:8px;
}

.form-control{
    width:100%;
    height:52px;
    border:1px solid #dbe4ff;
    border-radius:12px;
    padding:0 16px;
    font-size:14px;
    background:#fff;
}

.form-control:focus{
    border-color:#2563eb;
    outline:none;
    box-shadow:0 0 0 3px rgba(37,99,235,.08);
}

/* ================= BUTTON ================= */

.btn-transaksi{
    margin-top:16px;
    background:#2563eb;
    color:white;
    border:none;
    height:48px;
    padding:0 24px;
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.btn-transaksi:hover{
    background:#1d4ed8;
}

/* ================= RIGHT ================= */

.right-title{
    font-size:14px;
    font-weight:600;
    color:#334155;
    margin-bottom:10px;
}

/* ================= TABLE JENIS ================= */

.jenis-table{
    width:100%;
    border-collapse:collapse;
    border:1px solid #edf2ff;
    border-radius:14px;
    overflow:hidden;
}

.jenis-table thead{
    background:#f1f5ff;
}

.jenis-table th{
    padding:14px;
    text-align:center;
    font-size:13px;
    color:#1e3a8a;
    font-weight:700;
}

.jenis-table td{
    padding:8px;
    border-top:1px solid #edf2ff;
}

.jenis-table input{
    width:100%;
    height:42px;
    border:1px solid #dbe4ff;
    border-radius:10px;
    padding:0 14px;
    outline:none;
}

.jenis-table input:focus{
    border-color:#2563eb;
}

/* DELETE */
.btn-delete-row{
    width:38px;
    height:38px;
    border:none;
    border-radius:10px;
    background:#fee2e2;
    color:#ef4444;
}

/* TAMBAH BARIS */
.btn-baris{
    margin-top:10px;
    background:none;
    border:none;
    color:#2563eb;
    font-weight:600;
    font-size:13px;
}

/* ================= TABLE TRANSAKSI ================= */

.table-wrapper{
    background:#fff;
    border-radius:24px;
    padding:24px;
    box-shadow:0 10px 30px rgba(0,0,0,.04);
    margin-top:20px;
}

.table-title{
    font-size:26px;
    color:#2563eb;
    font-weight:700;
    margin-bottom:20px;
}

.table-modern{
    width:100%;
    border-collapse:collapse;
}

.table-modern thead{
    background:#eef4ff;
}

.table-modern th{
    padding:16px 14px;
    color:#1e3a8a;
    font-size:13px;
    font-weight:700;
}

.table-modern td{
    padding:18px 14px;
    border-bottom:1px solid #edf2ff;
    font-size:14px;
    color:#334155;
}

/* CUSTOMER */
.customer-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.customer-avatar{
    width:36px;
    height:36px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:14px;
    font-weight:700;
}

/* WARNA */
.purple{
    background:#9333ea;
}

.pink{
    background:#ec4899;
}

.blue{
    background:#4f46e5;
}

/* STATUS */
.status{
    padding:7px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.status.proses{
    background:#fef3c7;
    color:#ca8a04;
}

.status.cuci{
    background:#cffafe;
    color:#0891b2;
}

/* BUTTON AKSI */
.btn-mini{
    border:none;
    padding:7px 14px;
    border-radius:10px;
    color:white;
    font-size:12px;
    font-weight:600;
}

.btn-invoice{
    background:#facc15;
    color:#000;
}

.btn-update{
    background:#06b6d4;
}

.btn-delete{
    background:#ef4444;
}

/* PAGINATION */
.pagination-modern{
    display:flex;
    justify-content:center;
    gap:10px;
    margin-top:24px;
}

.page-btn{
    width:40px;
    height:40px;
    border:none;
    border-radius:10px;
    background:#eef2ff;
    color:#1e3a8a;
    font-weight:600;
}

.page-btn.active{
    background:#2563eb;
    color:white;
}

/* RESPONSIVE */
@media(max-width:900px){

    .transaksi-grid{
        grid-template-columns:1fr;
    }

    .table-modern{
        min-width:1000px;
    }

}

</style>

<div class="container-fluid">

    <!-- ================= FORM ================= -->

    <div class="transaksi-wrapper">

        <h3 class="section-title">
            Transaksi Baru
        </h3>

        <form method="post" action="transaksi_aksi.php">

            <div class="transaksi-grid">

                <!-- LEFT -->
                <div>

                    <div class="form-group">
                        <label>Pelanggan</label>

                        <select class="form-control" name="pelanggan">

                            <option>- Pilih Pelanggan -</option>

                            <?php
                            $data = mysqli_query($koneksi,"SELECT * FROM pelanggan");

                            while($d=mysqli_fetch_array($data)){
                            ?>

                            <option value="<?php echo $d['id_pelanggan']; ?>">
                                <?php echo $d['nama_pelanggan']; ?>
                            </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="form-group">
                        <label>Berat (Kg)</label>

                        <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian ..">
                    </div>

                    <div class="form-group">
                        <label>Tgl. Selesai</label>

                        <input type="date" class="form-control" name="tgl_selesai">
                    </div>

                    <!-- BUTTON KIRI -->
                    <button type="submit" class="btn-transaksi">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Tambah Transaksi
                    </button>

                </div>

                <!-- RIGHT -->
                <div>

                    <div class="right-title">
                        Jenis Pakaian
                    </div>

                    <table class="jenis-table">

                        <thead>

                            <tr>
                                <th>Jenis Pakaian</th>
                                <th width="30%">Jumlah</th>
                                <th width="10%">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php for($i=0;$i<5;$i++){ ?>

                        <tr>

                            <td>
                                <input type="text" name="jenis_pakaian[]" placeholder="Masukkan jenis pakaian ..">
                            </td>

                            <td>
                                <input type="number" name="jumlah_pakaian[]" placeholder="0">
                            </td>

                            <td align="center">

                                <button type="button" class="btn-delete-row">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </td>

                        </tr>

                        <?php } ?>

                        </tbody>

                    </table>

                    <button type="button" class="btn-baris">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Baris
                    </button>

                </div>

            </div>

        </form>

    </div>

    <!-- ================= TABLE ================= -->

    <div class="table-wrapper">

        <h3 class="table-title">
            Daftar Transaksi
        </h3>

        <table class="table-modern">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (Kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>1</td>
                    <td>INVOICE-11</td>
                    <td>2025-06-10</td>

                    <td>

                        <div class="customer-box">

                            <div class="customer-avatar purple">
                                G
                            </div>

                            Gizza

                        </div>

                    </td>

                    <td>5</td>
                    <td>2025-06-13</td>
                    <td>Rp. 40,000 ,-</td>

                    <td>
                        <span class="status proses">
                            PROSES
                        </span>
                    </td>

                    <td>

                        <button class="btn-mini btn-invoice">
                            Invoice
                        </button>

                        <button class="btn-mini btn-update">
                            Update
                        </button>

                        <button class="btn-mini btn-delete">
                            Delete
                        </button>

                    </td>

                </tr>

                <tr>

                    <td>2</td>
                    <td>INVOICE-10</td>
                    <td>2025-06-14</td>

                    <td>

                        <div class="customer-box">

                            <div class="customer-avatar pink">
                                A
                            </div>

                            Amanda

                        </div>

                    </td>

                    <td>10</td>
                    <td>2025-06-17</td>
                    <td>Rp. 60,000 ,-</td>

                    <td>
                        <span class="status proses">
                            PROSES
                        </span>
                    </td>

                    <td>

                        <button class="btn-mini btn-invoice">
                            Invoice
                        </button>

                        <button class="btn-mini btn-update">
                            Update
                        </button>

                        <button class="btn-mini btn-delete">
                            Delete
                        </button>

                    </td>

                </tr>

                <tr>

                    <td>3</td>
                    <td>INVOICE-9</td>
                    <td>2025-06-10</td>

                    <td>

                        <div class="customer-box">

                            <div class="customer-avatar blue">
                                D
                            </div>

                            Desi

                        </div>

                    </td>

                    <td>2</td>
                    <td>2025-06-12</td>
                    <td>Rp. 10,000 ,-</td>

                    <td>
                        <span class="status proses">
                            PROSES
                        </span>
                    </td>

                    <td>

                        <button class="btn-mini btn-invoice">
                            Invoice
                        </button>

                        <button class="btn-mini btn-update">
                            Update
                        </button>

                        <button class="btn-mini btn-delete">
                            Delete
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

        <!-- PAGINATION -->
        <div class="pagination-modern">

            <button class="page-btn">
                Previous
            </button>

            <button class="page-btn active">
                1
            </button>

            <button class="page-btn">
                Next
            </button>

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>