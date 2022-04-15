<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIT_DB_UTS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>UTS PSAIT</h1>
    <p>Nama : Rafa Ahamada Wijaya</p>
    <p>NIM : 20 / 464401 / SV / 18720</p>
    <table class="table">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Kode Matakuliah</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $api_url = 'http://192.168.56.45/sait_db_uts/api/rest_api.php';
                $content = file_get_contents($api_url);
                $data = json_decode($content, true);

                foreach ($data['data'] as $nilai) {
                    echo "
                        <tr>
                            <td>".$nilai['nim']."</td>
                            <td>".$nilai['nama']."</td>
                            <td>".$nilai['alamat']."</td>
                            <td>".$nilai['tanggal_lahir']."</td>
                            <td>".$nilai['kode_mk']."</td>
                            <td>".$nilai['nama_mk']."</td>
                            <td>".$nilai['sks']."</td>
                            <td>".$nilai['nilai']."</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>