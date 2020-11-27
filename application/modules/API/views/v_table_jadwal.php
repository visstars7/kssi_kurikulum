<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <style>
        #table {
            margin-left: auto;
            margin-right: auto;
        }

        #table,
        th,
        td {
            padding: 10px;
            border: 1px solid black;
        }

        h3 {
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h3 style="text-align:center"><strong>JADWAL KELAS <?= $kelas; ?></strong></h3>
        </div>
    </div>
    <div class="container-fluid">
        <table id="table" class="table table-bordered mt-3">
            <tr>
                <th>No</th>
                <th>Jam</th>
                <th>sesi</th>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jum'at</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($result as $value) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['waktu_mulai'] . "-" . $value['waktu_selesai']; ?></td>
                    <td><?= $value['sesi']; ?></td>
                    <td><?= $value['nama_mapel']; ?></td>
                    <td><?= $value['nama_mapel']; ?></td>
                    <td><?= $value['nama_mapel']; ?></td>
                    <td><?= $value['nama_mapel']; ?></td>
                    <td><?= $value['nama_mapel']; ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>

</body>

</html>