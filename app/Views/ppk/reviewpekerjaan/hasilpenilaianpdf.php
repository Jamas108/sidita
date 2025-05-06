<!-- File: app/Views/hasilpenilaianpdf.php -->
<html>

<head>
    <style>
        body {
            font-family: "Footlight MT", sans-serif;
            font-size: 12px;
        }

        h1 {
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 8px;
            text-align: center;
        }

        .header-info td {
    padding: 5px 10px; /* Kurangi padding */
}

.header-info td:first-child {
    width: 30%; /* Atur lebar agar elemen pertama tidak meluas */
    white-space: nowrap; /* Mencegah elemen pertama meluas ke beberapa baris */
}

        .section-title {
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>LEMBARAN PENILAIAN KINERJA PENYEDIA BARANG/JASA<br>UPN "VETERAN" JAWA TIMUR T.A. 2023</h1>
    <table class="header-info" width="100%">
        <tr>
            <td>Nama Perusahaan</td>
            <td>: <?= $pekerjaan['penyedia'] ?? '' ?></td>
        </tr>
        <tr>
            <?php foreach ($dptData as $dpt): ?>
                <td>Alamat Perusahaan</td>
                <td>: <?= esc($dpt['alamat']) ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>Paket Pekerjaan</td>
            <td>: <?= $pekerjaan['nama_paket_pengadaan'] ?? '' ?></td>
        </tr>
        <tr>
            <td>Lokasi Pekerjaan</td>
            <td>: <?= $pekerjaan['lokasi_pekerjaan'] ?? '' ?></td>
        </tr>
        <tr>
            <td>Nilai Kontrak</td>
            <td>: <?= $pekerjaan['nilai_kontrak_ppn'] ?? '' ?></td>
        </tr>
        <tr>
            <td>Nomor Kontrak</td>
            <td>: <?= $pekerjaan['nomor_kontrak'] ?? '' ?></td>
        </tr>
        <tr>
            <td>Jangka Waktu Pelaksanaan</td>
            <td>: <?= $durasi ?></td>
        </tr>
        <tr>
            <td>Metode Pemilihan Penyedia</td>
            <td>: <?= $pekerjaan['metode'] ?? '' ?></td>
        </tr>
    </table>

    <h2 class="section-title">Penilaian Kinerja</h2>

    <table class="table" width="100%">
        <tr>
            <th>No.</th>
            <th>Aspek Kinerja</th>
            <th>Bobot (%)</th>
            <th>Kriteria dan Skor</th>
            <th>Nilai Kinerja</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Kualitas dan Kuantitas Pekerjaan</td>
            <td>30%</td>
            <td><?= $penilaian['skor_kinerja_kualitas_dan_kuantitas_pekerjaan'] ?? '' ?></td>
            <td><?= $penilaian['nilai_kinerja_kualitas_dan_kuantitas_pekerjaan'] ?? '' ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Biaya</td>
            <td>20%</td>
            <td><?= $penilaian['skor_kinerja_biaya'] ?? '' ?></td>
            <td><?= $penilaian['nilai_kinerja_biaya'] ?? '' ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Waktu</td>
            <td>30%</td>
            <td><?= $penilaian['skor_kinerja_waktu'] ?? '' ?></td>
            <td><?= $penilaian['nilai_kinerja_waktu'] ?? '' ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Layanan</td>
            <td>20%</td>
            <td><?= $penilaian['skor_kinerja_layanan'] ?? '' ?></td>
            <td><?= $penilaian['nilai_kinerja_layanan'] ?? '' ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td colspan="3">Nilai Total</td>
            <td><?= $penilaian['nilai_total_kinerja'] ?? '' ?></td>
        </tr>
    </table>

    <!-- Tabel untuk Keterangan dan Catatan bersebelahan -->
    <table width="100%" style="margin-top: 20px;">
        <tr>
            <!-- Kolom Keterangan -->
            <td style="vertical-align: top; width: 50%; padding-right: 10px;">
                <p><strong>Ket:</strong></p>
                <ul style="list-style-type: none; padding-left: 0;">
                    <li>Coret yang tidak sesuai</li>
                    <li>Nilai Kinerja 0 = Buruk</li>
                    <li>Nilai Kinerja 1 ≤ skor &lt; 2 = Cukup</li>
                    <li>Nilai Kinerja 2 ≤ skor &lt; 3 = Baik</li>
                    <li>Nilai Kinerja 3 = Sangat Baik</li>
                </ul>
            </td>

            <!-- Kolom Catatan dan Rekomendasi -->
            <td style="vertical-align: top; width: 50%; padding-left: 10px; border: 1px solid black; padding: 10px;">
                <strong>Catatan dan rekomendasi:</strong>
                <p><?= $penilaian['catatan'] ?? '-' ?></p>
            </td>
        </tr>
    </table>

    <!-- Bagian Tanda Tangan -->
    <div style="position: absolute; bottom: 140px; right: 30px; text-align: center;">
        <p>Surabaya, 10 Januari 2024</p>
        <p>Penilai,</p>
        <p><?= $penilaian['posisi_penilai'] ?></p>


        <p style="margin-top: 100px;"><?= $penilaian['nama_penilai'] ?><br>
            NIP <?= $penilaian['nip_penilai'] ?></p>
    </div>

</body>

</html>