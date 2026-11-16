<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<style>

body{
    background:#f4f8ff;
    font-family:'Poppins',sans-serif;
}

/* ================= WRAPPER ================= */

.laporan-wrapper{
    padding:20px;
}

/* ================= CARD ================= */

.card-modern{
    background:white;
    border-radius:26px;
    padding:28px;
    box-shadow:0 10px 30px rgba(0,0,0,.04);
    margin-bottom:24px;
}

/* ================= TITLE ================= */

.title-modern{
    font-size:30px;
    font-weight:700;
    color:#1e3a8a;
    margin-bottom:24px;
}

/* ================= FILTER ================= */

.filter-grid{
    display:grid;
    grid-template-columns:1fr 1fr auto;
    gap:18px;
    align-items:end;
}

/* INPUT */
.form-group label{
    display:block;
    margin-bottom:8px;
    font-size:14px;
    font-weight:600;
    color:#334155;
}

.form-control{
    width:100%;
    height:52px;
    border:1px solid #dbe4ff;
    border-radius:14px;
    padding:0 16px;
    font-size:14px;
    outline:none;
    background:#fff;
}

.form-control:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.08);
}

/* BUTTON */
.btn-filter{
    height:52px;
    padding:0 28px;
    border:none;
    border-radius:14px;
    background:#2563eb;
    color:white;
    font-weight:600;
    transition:.3s;
}

.btn-filter:hover{
    background:#1d4ed8;
}

/* ================= INFO ================= */

.info-laporan{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:22px;
    flex-wrap:wrap;
    gap:14px;
}

.info-laporan h4{
    font-size:26px;
    color:#1e293b;
    font-weight:600;
}

.info-laporan span{
    color:#2563eb;
    font-weight:700;
}

/* CETAK */
.btn-cetak{
    background:#06b6d4;
    color:white;
    border:none;
    padding:12px 22px;
    border-radius:14px;
    font-weight:600;
    transition:.3s;
}

.btn-cetak:hover{
    background:#0891b2;
}

/* ================= TABLE ================= */

.table-wrapper{
    overflow-x:auto;
}

.table-modern{
    width:100%;
    border-collapse:collapse;
    min-width:950px;
}

/* HEADER */
.table-modern thead{
    background:#eef4ff;
}

.table-modern th{
    padding:16px 14px;
    text-align:left;
    color:#1e3a8a;
    font-size:13px;
    font-weight:700;
}

.table-modern th:first-child{
    border-radius:12px 0 0 12px;
}

.table-modern th:last-child{
    border-radius:0 12px 12px 0;
}

/* BODY */
.table-modern td{
    padding:18px 14px;
    border-bottom:1px solid #edf2ff;
    color:#334155;
    font-size:14px;
}

/* STATUS */
.status{
    padding:8px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    display:inline-block;
}

.status.proses{
    background:#fef3c7;
    color:#ca8a04;
}

.status.cuci{
    background:#cffafe;
    color:#0891b2;
}

.status.selesai{
    background:#dcfce7;
    color:#16a34a;
}

/* CUSTOMER */
.customer-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.customer-avatar{
    width:38px;
    height:38px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:700;
    font-size:14px;
}

/* COLORS */
.purple{ background:#9333ea; }
.pink{ background:#ec4899; }
.blue{ background:#4f46e5; }
.green{ background:#10b981; }
.orange{ background:#f59e0b; }

/* RESPONSIVE */
@media(max-width:900px){

    .filter-grid{
        grid-template-columns:1fr;
    }

}

</style>

<div class="laporan-wrapper">

    <!-- ================= FILTER ================= -->

    <div class="card-modern">

        <h2 class="title-modern">
            Filter Laporan
        </h2>

        <form method="GET">

            <div class="filter-grid">

                <!-- DARI -->
                <div class="form-group">

                    <label>Dari Tanggal</label>

                    <input 
                        type="date"
                        class="form-control"
                        name="dari"
                        required
                    >

                </div>

                <!-- SAMPAI -->
                <div class="form-group">

                    <label>Sampai Tanggal</label>

                    <input 
                        type="date"
                        class="form-control"
                        name="sampai"
                        required
                    >

                </div>

                <!-- BUTTON -->
                <button class="btn-filter">

                    <i class="fa-solid fa-filter"></i>
                    Filter

                </button>

            </div>

        </form>

    </div>

    <!-- ================= TABLE ================= -->

    <div class="card-modern">

        <!-- INFO -->
        <div class="info-laporan">

            <h4>
                Data Laporan Laundry dari
                <span>2024-05-27</span>
                sampai
                <span>2024-05-28</span>
            </h4>

            <button class="btn-cetak">

                <i class="fa-solid fa-print"></i>
                Cetak

            </button>

        </div>

        <!-- TABLE -->
        <div class="table-wrapper">

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
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>1</td>

                        <td>
                            INV-11
                        </td>

                        <td>
                            2026-05-27
                        </td>

                        <td>

                            <div class="customer-box">

                                <div class="customer-avatar purple">
                                    G
                                </div>

                                Gizza

                            </div>

                        </td>

                        <td>5 Kg</td>

                        <td>
                            2026-05-28
                        </td>

                        <td>
                            Rp 40,000
                        </td>

                        <td>

                            <span class="status proses">
                                PROSES
                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>2</td>

                        <td>
                            INV-10
                        </td>

                        <td>
                            2026-05-27
                        </td>

                        <td>

                            <div class="customer-box">

                                <div class="customer-avatar pink">
                                    A
                                </div>

                                Amanda

                            </div>

                        </td>

                        <td>10 Kg</td>

                        <td>
                            2026-05-29
                        </td>

                        <td>
                            Rp 60,000
                        </td>

                        <td>

                            <span class="status cuci">
                                DICUCI
                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>3</td>

                        <td>
                            INV-09
                        </td>

                        <td>
                            2026-05-27
                        </td>

                        <td>

                            <div class="customer-box">

                                <div class="customer-avatar blue">
                                    D
                                </div>

                                Desi

                            </div>

                        </td>

                        <td>2 Kg</td>

                        <td>
                            2026-05-28
                        </td>

                        <td>
                            Rp 10,000
                        </td>

                        <td>

                            <span class="status selesai">
                                SELESAI
                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>