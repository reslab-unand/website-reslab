<?php

date_default_timezone_set('Asia/Jakarta');


if (isset($_POST["submit"])) {
    $day = date("d");
    $month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember",][(int)date("m") - 1];
    $year = date("Y");

    $date = "$day $month $year";

    $hal = $_POST["jenis"];
    $tujuan = $_POST["tujuan"];
    $datadiri = [
        "nama" => ucwords($_POST["nama"]),
        "nim" => $_POST["nim"],
        "nohp" => $_POST["nohp"]
    ];
    $datakomponen = $_POST["data"];

    $koorInventaris = [
        "nama" => "Melly Wasilah Ananda",
        "nim" => "1911511003"
    ];
} else {
    header("Location: /peminjaman");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat <?= $hal . " - " . $datadiri["nama"]; ?></title>
    <link rel="stylesheet" href="css/print.css">
</head>

<body>
    <div id="bg"></div>
    <?php if (isset($_POST["submit"])) : ?>
        <div id="print-button-container">
            <button type="button" name="print-button" id="print-button">Print Surat</button>
        </div>
        <div id="container">
            <table>
                <!-- Header -->
                <thead>
                    <tr>
                        <th>
                            <section id="header">
                                <div id="logo_unand"><img src="img/logo_unand.jpg" alt="Logo Unand" width="80"></div>
                                <div id="text_header">
                                    <h3>Robotics & Embedded System Laboratory</h3>
                                    <h3>Departemen Teknik Komputer</h3>
                                    <h3>Fakultas Teknologi Informasi</h3>
                                    <h3>Universitas Andalas</h3>
                                    <p style="font-weight: normal;">Kampus UNAND Limau Manih, Padang 25163, <br>website:
                                        reslab.sk.unand.ac.id, email:
                                        reslab.sk@fti.unand.ac.id</p>
                                </div>
                                <div id="logo_reslab"><img src="img/logo_reslab.png" alt="Logo Reslab" width="100"></div>
                            </section>
                        </th>
                    </tr>
                </thead>
                <!-- End Header -->

                <!-- Content -->
                <tbody>
                    <!-- Perihal, Tanggal -->
                    <tr>
                        <td>
                            <section id="keterangan-surat">
                                <div id="perihal">
                                    <p>Hal : <?= $hal; ?></p>
                                </div>
                                <div id="tanggal">
                                    <p>Padang, <?= $date; ?></p>
                                </div>
                            </section>
                        </td>
                    </tr>
                    <!-- EndSection -->

                    <!-- Tujuan -->
                    <tr>
                        <td>
                            <div id="tujuan">
                                <p>Yth. Kepala Laboratorium Sistem <i>Embedded</i> dan Robotika</p>
                                <p>di Padang</p>
                            </div>
                        </td>
                    </tr>
                    <!-- EndSection -->

                    <!-- Isi Surat -->
                    <tr>
                        <td>
                            <section id="isi-surat">
                                <p>Dengan hormat,</p>
                                <p style="text-indent: 2rem; text-align: justify;">Sehubungan dengan proyek yang sedang saya lakukan guna menyelesaikan <b><?= $tujuan; ?></b>, sesuai dengan kurikulum di Departemen Teknik Komputer Fakultas Teknologi Informasi Universitas Andalas maka dengan ini :</p>
                                <div id="data-diri">
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?= $datadiri["nama"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>NIM</td>
                                            <td>:</td>
                                            <td><?= $datadiri["nim"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. HP</td>
                                            <td>:</td>
                                            <td><?= $datadiri["nohp"]; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="data-komponen">
                                    <p>Pengajuan permohonan peminjaman alat/ komponen Labor sebagai berikut :</p>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No.</th>
                                                <th rowspan="2">Nama Alat/Komponen</th>
                                                <th rowspan="2">Jumlah</th>
                                                <th colspan="2">Tanggal</th>
                                                <th rowspan="2">Ket</th>
                                            </tr>
                                            <tr>
                                                <th>Peminjaman</th>
                                                <th>Pengembalian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($datakomponen as $komponen) : ?>
                                                <tr>
                                                    <td align="center"><?= $no; ?></td>
                                                    <td style="padding-left: 1rem"><?= ucwords($komponen["komponen"]); ?></td>
                                                    <td align="center"><?= $komponen["jumlah"]; ?></td>
                                                    <td align="center"><?= !empty($komponen["komponen"]) ? $date : ""; ?></td>
                                                    <td align="center"></td>
                                                    <td align="center"></td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="aturan">
                                    <p><b>Persyaratan dan Kondisi:</b></p>
                                    <ul>
                                        <li>Jangka waktu peminjaman 7 hari sejak waktu ditetapkan</li>
                                        <li>Masa perpanjangan waktu peminjaman dapat dilakukan maksimal 2 kali (1 kali
                                            perpanjangan selama 3 hari)</li>
                                        <li>Peminjaman untuk penelitian jangka panjang dan Lomba dapat dikonsultasikan
                                            dengan
                                            Koordinator Labor mengenai jangka waktu peminjaman</li>
                                    </ul>
                                </div>
                            </section>
                        </td>
                    </tr>
                    <!-- EndSection -->

                    <!-- Tanda Tangan -->
                    <tr>
                        <td>
                            <section id="tanda-tangan">
                                <div id="koor-inventaris">
                                    <p>Diketahui oleh,</p>
                                    <p>Koordinator Inventaris</p>
                                    <br>
                                    <br>
                                    <br>
                                    <p><u><?= $koorInventaris["nama"]; ?></u></p>
                                    <p>NIM. <?= $koorInventaris["nim"]; ?></p>
                                </div>
                                <div id="peminjam">
                                    <p>Hormat saya,</p>
                                    <p>Mahasiswa</p>
                                    <br>
                                    <br>
                                    <br>
                                    <p><u><?= ucwords($datadiri["nama"]); ?></u></p>
                                    <p>NIM. <?= $datadiri["nim"]; ?></p>
                                </div>
                            </section>
                        </td>
                    </tr>
                    <!-- EndSection -->
                </tbody>
                <!-- End Content -->
            </table>
        </div>
        <script src="js/print.js"></script>
    <?php endif; ?>
</body>

</html>