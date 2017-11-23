<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <table>
        <tr><th>Nim</th><th>Nama</th><th>Email</th><th>IPK</th></tr>
        <?php 
        foreach ($mahasiswa as $m){
            echo "<tr><td>$m->nim</td><td>$m->nama</td><td>$m->email</td><td>$m->ipk</td></tr>";
        }
        ?>
    </table>
</body>
</html>