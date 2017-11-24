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

    <?php 
     
            echo $this->session->flashdata('hasil');
         ?>
    <table border="1">
        <tr><th>Nim</th><th>Nama</th><th>Email</th><th>IPK</th></tr>
        <?php 
        foreach($mahasiswa as $mhs){
            echo "<tr><td>".$mhs->nim."</td>
            <td>".$mhs->nama."</td>
            <td>".$mhs->email."</td>
            <td>".$mhs->ipk."</td>
            <td>".anchor('MahasiswaClient/edit/'.$mhs->nim,'Edit')."</td>
            <td>".anchor('MahasiswaClient/delete/'.$mhs->nim,'Delete')."</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>